<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/**
 * Regenerate pengajuan PDFs with updated verification links and QR images.
 * Usage: php artisan pengajuan:regenerate-pdf --all
 *        php artisan pengajuan:regenerate-pdf --id=1,2,3
 */
Artisan::command('pengajuan:regenerate-pdf {--all} {--id=} ', function () {
    $this->info('Starting PDF regeneration...');

    $ids = $this->option('id');
    $all = $this->option('all');

    $query = App\Models\PengajuanSurat::query();
    if (!$all && $ids) {
        $ids = array_filter(array_map('trim', explode(',', $ids)));
        $query->whereIn('id', $ids);
    }

    $count = $query->count();
    if ($count === 0) {
        $this->info('No pengajuan found to process.');
        return;
    }

    $this->info("Found $count pengajuan(s). Regenerating PDFs...");

    $processed = 0;
    foreach ($query->cursor() as $pengajuan) {
        try {
            $role = config('app.ttd_role', 'admin');
            $payload = $pengajuan->id . '|' . ($pengajuan->user_id ?? '') . '|' . $role;
            $sig = substr(hash_hmac('sha256', $payload, config('app.key')), 0, 6);
            $p = $payload . '|' . $sig;

            $base = rtrim(config('app.verification_url', config('app.url')), '/');
            if (preg_match('/^https:\/\/(localhost|127\.0\.0\.1)(:\d+)?/i', $base)) {
                $base = preg_replace('/^https:/i', 'http', $base);
            }
            $verifyUrl = $base . '/pengajuan/ttd?p=' . urlencode($p);

            // make QR
            $fg = config('app.qr.fg', '0052d4');
            $bg = config('app.qr.bg', 'FFFFFF');
            $size = config('app.qr.size', '300x300');
            $remote = 'https://api.qrserver.com/v1/create-qr-code/?size=' . $size . '&data=' . urlencode($verifyUrl) . '&color=' . $fg . '&bgcolor=' . $bg . '&qzone=2';

            $qrSrc = null;
            try {
                if (class_exists(\Illuminate\Support\Facades\Http::class)) {
                    $response = \Illuminate\Support\Facades\Http::get($remote);
                    if ($response->ok()) {
                        $qrSrc = 'data:image/png;base64,' . base64_encode($response->body());
                    }
                } else {
                    $img = @file_get_contents($remote);
                    if ($img !== false) { $qrSrc = 'data:image/png;base64,' . base64_encode($img); }
                }
            } catch (\Throwable $e) {
                $qrSrc = null;
            }

            if (!class_exists(\Barryvdh\DomPDF\Facade\Pdf::class) && !class_exists('PDF')) {
                $this->error('Pdf package not installed. Run: composer require barryvdh/laravel-dompdf');
                return;
            }

            $pdf = \PDF::loadView('pdfs.pengajuan_surat', compact('pengajuan', 'qrSrc', 'verifyUrl'));

            $fileName = 'surat-' . str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) . '.pdf';
            $path = 'pengajuan-surat/pdf/' . $fileName;
            \Illuminate\Support\Facades\Storage::disk('public')->put($path, $pdf->output());

            $this->info("Regenerated PDF for pengajuan #{$pengajuan->id} -> $path");
            $processed++;
        } catch (\Throwable $e) {
            $this->error("Failed processing #{$pengajuan->id}: " . $e->getMessage());
        }
    }

    $this->info("Completed. $processed PDFs generated and stored to public disk.");
})->purpose('Regenerate pengajuan PDFs (use --all or --id=1,2)');

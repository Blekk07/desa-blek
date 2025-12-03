<?php

namespace App\Helpers;

class LocationHelper
{
    public static function getTempatlahirList()
    {
        return [
            'ACEH' => [
                'Banda Aceh, Aceh',
                'Sabang, Aceh',
            ],
            'SUMATERA UTARA' => [
                'Medan, Sumatera Utara',
                'Binjai, Sumatera Utara',
            ],
            'SUMATERA BARAT' => [
                'Padang, Sumatera Barat',
                'Bukittinggi, Sumatera Barat',
            ],
            'RIAU' => [
                'Pekanbaru, Riau',
                'Dumai, Riau',
            ],
            'JAMBI' => [
                'Jambi, Jambi',
                'Sungai Penuh, Jambi',
            ],
            'SUMATERA SELATAN' => [
                'Palembang, Sumatera Selatan',
                'Prabumulih, Sumatera Selatan',
            ],
            'BENGKULU' => [
                'Bengkulu, Bengkulu',
            ],
            'LAMPUNG' => [
                'Bandar Lampung, Lampung',
                'Metro, Lampung',
            ],
            'KEPULAUAN BANGKA BELITUNG' => [
                'Pangkal Pinang, Bangka Belitung',
            ],
            'DKI JAKARTA' => [
                'Jakarta Pusat, DKI Jakarta',
                'Jakarta Utara, DKI Jakarta',
                'Jakarta Timur, DKI Jakarta',
                'Jakarta Barat, DKI Jakarta',
                'Jakarta Selatan, DKI Jakarta',
            ],
            'JAWA BARAT' => [
                'Bandung, Jawa Barat',
                'Bogor, Jawa Barat',
                'Depok, Jawa Barat',
                'Bekasi, Jawa Barat',
                'Cirebon, Jawa Barat',
                'Tasikmalaya, Jawa Barat',
                'Banjar, Jawa Barat',
            ],
            'JAWA TENGAH' => [
                'Semarang, Jawa Tengah',
                'Surakarta, Jawa Tengah',
                'Pekalongan, Jawa Tengah',
                'Tegal, Jawa Tengah',
                'Magelang, Jawa Tengah',
                'Salatiga, Jawa Tengah',
            ],
            'DAERAH ISTIMEWA YOGYAKARTA' => [
                'Yogyakarta, DI Yogyakarta',
            ],
            'JAWA TIMUR' => [
                'Surabaya, Jawa Timur',
                'Sidoarjo, Jawa Timur',
                'Gresik, Jawa Timur',
                'Pasuruan, Jawa Timur',
                'Probolinggo, Jawa Timur',
                'Malang, Jawa Timur',
                'Batu, Jawa Timur',
                'Kediri, Jawa Timur',
                'Blitar, Jawa Timur',
                'Tulungagung, Jawa Timur',
                'Trenggalek, Jawa Timur',
                'Jombang, Jawa Timur',
                'Mojokerto, Jawa Timur',
                'Bojonegoro, Jawa Timur',
                'Tuban, Jawa Timur',
                'Lamongan, Jawa Timur',
                'Sumenep, Jawa Timur',
                'Bangkalan, Jawa Timur',
                'Sampang, Jawa Timur',
                'Pamekasan, Jawa Timur',
            ],
            'BANTEN' => [
                'Serang, Banten',
                'Cilegon, Banten',
                'Tangerang, Banten',
            ],
            'BALI' => [
                'Denpasar, Bali',
            ],
            'NUSA TENGGARA BARAT' => [
                'Mataram, Nusa Tenggara Barat',
                'Bima, Nusa Tenggara Barat',
            ],
            'NUSA TENGGARA TIMUR' => [
                'Kupang, Nusa Tenggara Timur',
            ],
            'KALIMANTAN BARAT' => [
                'Pontianak, Kalimantan Barat',
                'Singkawang, Kalimantan Barat',
            ],
            'KALIMANTAN TENGAH' => [
                'Palangka Raya, Kalimantan Tengah',
            ],
            'KALIMANTAN SELATAN' => [
                'Banjarmasin, Kalimantan Selatan',
                'Banjarbaru, Kalimantan Selatan',
            ],
            'KALIMANTAN TIMUR' => [
                'Samarinda, Kalimantan Timur',
                'Balikpapan, Kalimantan Timur',
            ],
            'KALIMANTAN UTARA' => [
                'Tarakan, Kalimantan Utara',
            ],
            'SULAWESI UTARA' => [
                'Manado, Sulawesi Utara',
                'Bitung, Sulawesi Utara',
            ],
            'SULAWESI TENGAH' => [
                'Palu, Sulawesi Tengah',
            ],
            'SULAWESI SELATAN' => [
                'Makassar, Sulawesi Selatan',
                'Palopo, Sulawesi Selatan',
            ],
            'SULAWESI BARAT' => [
                'Mamuju, Sulawesi Barat',
            ],
            'SULAWESI TENGGARA' => [
                'Kendari, Sulawesi Tenggara',
                'Bau-Bau, Sulawesi Tenggara',
            ],
            'GORONTALO' => [
                'Gorontalo, Gorontalo',
            ],
            'MALUKU' => [
                'Ambon, Maluku',
                'Tual, Maluku',
            ],
            'MALUKU UTARA' => [
                'Ternate, Maluku Utara',
                'Tidore, Maluku Utara',
            ],
            'PAPUA' => [
                'Jayapura, Papua',
            ],
            'PAPUA BARAT' => [
                'Manokwari, Papua Barat',
            ],
        ];
    }

    public static function getTempatLahirGrouped()
    {
        return self::getTempatlahirList();
    }
}

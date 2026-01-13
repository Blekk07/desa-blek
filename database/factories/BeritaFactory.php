<?php

namespace Database\Factories;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition(): array
    {
        $judul = fake()->sentence(rand(3, 7));
        $isPublished = fake()->boolean(70); // ~70% published

        return [
            'judul' => $judul,
            'konten' => '<p>' . implode('</p><p>', fake()->paragraphs(rand(3, 6))) . '</p>',
            'gambar' => fake()->boolean(60) ? 'https://picsum.photos/1200/600?random=' . rand(1, 9999) : null,
            'caption' => fake()->boolean(70) ? fake()->sentence(rand(4,8)) : null,
            'user_id' => User::inRandomOrder()->value('id'),
            'published_at' => $isPublished ? fake()->dateTimeBetween('-90 days', 'now') : null,
        ];
    }
}

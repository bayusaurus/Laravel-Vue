<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Action',
            'Adventure',
            'Comedy',
            'Drama',
            'Fantasy',
            'Horror',
            'Magic',
            'Musical',
            'Mystery',
            'Psychological',
            'Romance',
            'Sci-Fi',
            'Slice of Life',
            'Supernatural',
            'Thriller',
            'Western',
        ]);

        $genres->each(function ($genre) {
            Genre::create([
                'name' => $genre,
                'slug' => Str::slug($genre)
            ]);
        });
    }
}

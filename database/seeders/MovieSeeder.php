<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            ['Joker', 2, 'Warner Bros. Pictures', '2019-11-07', '', '120', 'zAGVQLHvwOY', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211458095fff0a812e325.jpg', '011320211458115fff0a83e9d63.jpg'],
            ['Fabricated City', 2, 'Zero Media', '2019-11-07', '', '120', 'nWH__bffCOk', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211504325fff0c00c148d.jpg', '011320211504325fff0c00c5805.jpg'],
            ['Vagabond',  3, 'Netflix', '2019-11-07', '', '120', 'Kln4ByBiq-o', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211506245fff0c709a914.jpg', '011320211504325fff0c00c5805.jpg'],
            ['Backstreet Rookie',  3, 'TvN', '2019-11-07', '', '120', 'loUVzOL49W8', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211509205fff0d2011a88.jpg', '011320211509205fff0d2014a8c.jpg'],
            ['Green Street Hoologan',  1, 'OddLor', '2019-11-07', '', '120', 'etC_-WzvdqY', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211512555fff0df7f2ba2.jpg', '011320211512565fff0df801b7c.jpg'],
            ['Shingeki no Kyojin',  2, 'WIT Studio', '2019-11-07', '', '120', 'FY17vwF0Bqc', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211516235fff0ec7a1459.jpg', '011320211516235fff0ec7a404d.jpg'],
            ['The Avengers : Endgame',  1, 'Marvel Entertainment', '2019-11-07', '', '120', 'TcMBFSGVi1c', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211518345fff0f4a4fce5.jpg', '011320211518345fff0f4a527e8.jpg'],
            ['One Piece', 1, 'Toei Animation', '2019-11-07', '', '120', 'H4b2YjVWgqo', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211520445fff0fcc2dec3.jpg', '011320211520445fff0fcc30d5e.jpg'],
            ['JoJo Bizzare Adventure Stardust Crusaders', 1, 'Mappa', '2019-11-07', '', '120', 'GR6sJfFdB9I', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211523255fff106d5edee.jpg', '011320211523255fff106d65708.jpg'],
            ['Crash Landing on You',  3, 'Netflix', '2019-11-07', '', '120', 'eXMjTXL2Vks', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211525185fff10de0ae48.jpg', '011320211525185fff10de0dd78.jpg'],
            ['Bungou Stray Dogs',  1, 'Tokyo', '2019-11-07', '', '120', 'f9OV_KzR3SM', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211527425fff116e5fedc.jpg', '011320211527425fff116e627d3.jpg'],
            ['The Uncanny Counter', 3, 'Netflix', '2019-11-07', '', '120', 'rI55SRM6uhs', '', 'Arthur Fleck, seorang badut pesta, hidup dalam keadaan sulit bersama ibunya yang sakit-sakitan. Karena orang-orang menganggapnya aneh, ia memutuskan untuk berubah menjadi jahat dan membuat kekacauan.', '011320211529415fff11e56f4b7.jpg', '011320211529415fff11e57288a.jpg'],
        ];

        foreach($movies as $movie){
            $mv = Movie::create([
                'title' => $movie[0],
                'slug' => Str::slug($movie[0]),
                'category_id' => $movie[1],
                'studio' => $movie[2],
                'release' => $movie[3],
                // 'finish' => $movie[4],
                'duration' => $movie[5],
                'trailer' => $movie[6],
                'total_episode' => $movie[7],
                'synopsis' => $movie[8],
                'poster_portrait' => $movie[9],
                'poster_landscape' => $movie[10],
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Genre, Movie};
use Illuminate\Support\Str;
use App\Http\Resources\MovieResource;
use Illuminate\Http\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function index()
    {
        // $movie = Movie::findOrFail(2);
        $new = Movie::latest()->take(4)->get();
        return [
            'newPosts' => MovieResource::collection($new),
            'anime' => Movie::whereCategoryId(1)->latest()->take(4)->get(),
            'movie' => Movie::whereCategoryId(2)->latest()->take(4)->get(),
            'series' => Movie::whereCategoryId(3)->latest()->take(4)->get(),
        ];
        // return response()->json([
        //     'movie' => $movie,
        //     'genre' => $movie->genres,
        //     'category' => $movie->category,
        // ]); 
    }
    public function show(Movie $movie)
    {
        // $movie = Movie::findOrFail(2);
        return MovieResource::make($movie);
    }

    public function store()
    {
        request()->validate([
            //kosongkan form
            'title' => 'required|unique:movies,title',
            'category' => 'required',
            'release' => 'required|date',
            'finish' => 'nullable|date',
            'genre' => 'required',
            'studio' => 'required',
            'total_episode' => '',
            'duration' => 'nullable',
            'trailer' => 'required',
            'poster_portrait' => 'required',
            'poster_landscape' => 'required',
            'synopsis' => 'required',
        ]);
        //memisahkan genre
        $genre = explode(",",request()->genre);

        //memisahkan link
        $trailer = explode("=",request()->trailer);
        $trailer = end($trailer);

        $portrait = date('mdYHis') . uniqid() . '.' . request()->file('poster_portrait')->extension();
        $foto_portrait = request()->file('poster_portrait')->move(public_path('images/poster_portrait'), $portrait);
        $landscape = date('mdYHis') . uniqid() . '.' . request()->file('poster_landscape')->extension();
        $foto_landscape = request()->file('poster_landscape')->move(public_path('images/poster_landscape'), $landscape);
        
        $movie = Movie::create([
            'title' => request()->title,
            'slug' => Str::slug(request()->title),
            'category_id' => request()->category,
            'release' => request()->release,
            'finish' => request()->finish,
            'studio' => request()->studio,
            'total_episode' => request()->total_episode,
            'duration' => request()->duration,
            'trailer' => $trailer,
            'poster_portrait' => $portrait,
            'poster_landscape' => $landscape,
            'synopsis' => request()->synopsis
        ]);

        $movie->genres()->sync($genre);
        
        return response()->json([
            'message' => 'Movie successfully created.',
            // 'genre' => $genre,
            'slug' => $movie->slug
        ]);
    }

    public function update(Movie $movie)
    {
        request()->validate([
            //kosongkan form
            'title' => 'required|unique:movies,id,'. $movie->id,
            'category' => 'required',
            'release' => 'required|date',
            'finish' => 'nullable|date',
            'genre' => 'required',
            'studio' => 'required',
            'total_episode' => '',
            'duration' => 'required',
            'trailer' => 'required',
            'poster_portrait' => 'nullable',
            'poster_landscape' => 'nullable',
            'synopsis' => 'required',
        ]);
        
        if (request('poster_portrait')) {
            $image_path = 'images/poster_portrait/' . $movie->poster_portrait;
            if (File::exists(public_path($image_path))) {
                File::delete(public_path($image_path));
            }
            $portrait = date('mdYHis') . uniqid() . '.' . request()->file('poster_portrait')->extension();
            $foto = request()->file('poster_portrait')->move(public_path('images/poster_portrait'), $portrait);
        } elseif ($movie->poster_portrait) {
            $portrait = $movie->poster_portrait;
        } else {
            $portrait = null;
        }
        
        if (request('poster_landscape')) {
            $image_path = 'images/poster_landscape/' . $movie->poster_landscape;
            if (File::exists(public_path($image_path))) {
                File::delete(public_path($image_path));
            }
            $landscape = date('mdYHis') . uniqid() . '.' . request()->file('poster_landscape')->extension();
            $foto = request()->file('poster_landscape')->move(public_path('images/poster_landscape'), $landscape);
        } elseif ($movie->poster_landscape) {
            $landscape = $movie->poster_landscape;
        } else {
            $landscape = null;
        }

        //memisahkan genre
        $genre = explode(",",request()->genre);

        //memisahkan link
        $trailer = explode("=",request()->trailer);
        $trailer = end($trailer);

        $movie->update([
            'title' => request()->title,
            'slug' => Str::slug(request()->title),
            'category_id' => request()->category,
            'release' => request()->release,
            'finish' => request()->finish,
            'studio' => request()->studio,
            'total_episode' => request()->total_episode,
            'duration' => request()->duration,
            'trailer' => $trailer,
            'poster_portrait' => $portrait,
            'poster_landscape' => $landscape,
            'synopsis' => request()->synopsis
        ]);

        $movie->genres()->sync($genre);
        
        return response()->json([
            'message' => 'Movie successfully updated.',
            // 'genre' => $genre,
            'slug' => $movie->slug
        ]);
    }

    public function destroy(Movie $movie)
    {
        $image_path = 'images/poster_portrait/' . $movie->poster_portrait;
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }

        $image_path = 'images/poster_landscape/' . $movie->poster_landscape;
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }

        $movie->genres()->detach();
        $movie->delete();
        return 'Movie succssfully deleted!';
    }

    public function getByCategory($slug)
    {   
        $category =  Category::where('slug', $slug)->firstOrFail();
        return [
            'slug' => $slug,
            'movies' => Movie::whereHas('category', function ($query) use ($slug) {
                $query->where('slug', '=', $slug);
            })->simplePaginate(6)
        ];
    }

    public function getByGenre($slug)
    {
        $genre =  Genre::where('slug', $slug)->firstOrFail();
        return [
            'slug' => $slug,
            'movies' => Movie::whereHas('genres', function ($query) use ($slug) {
                $query->where('slug', '=', $slug);
            })->simplePaginate(6)
        ];
    }

    public function search($slug)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($slug) {

            // Using the Laravel Scout syntax to search the products table.
            // $posts = Movie::search($slug)->get();
            
            $keywords = explode(" ",$slug);

            $posts = Movie::where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                   $query->orWhere('title', 'like', '%'. $keyword . '%');
                }
            })->simplePaginate(6);
            
            // $posts = DB::table('movies')
            // ->where('title', 'like', '%jojo%')
            // ->orWhere('title', 'like', '%joker%')
            // ->get();

            $posts = MovieResource::collection($posts);

            // If there are results return them, if none, return the error message.
            return $posts->count() ? $posts : $error;

        }

        // Return the error message if no keywords existed
        return $error;
    }
}

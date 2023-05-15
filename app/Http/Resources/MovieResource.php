<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'categoryId' => $this->category->id,
            'category' => $this->category->name,
            'categorySlug' => $this->category->slug,
            'genres' => $this->genres,
            'studio' => $this->studio,
            // 'release_year' => date('Y', $this->release),
            'release_date' => $this->release,
            'finish_date' => $this->finish,
            'total_episode' => $this->total_episode,
            'duration' => $this->duration,
            'synopsis' => $this->synopsis,
            'trailer' => $this->trailer,
            'poster_portrait' => $this->poster_portrait,
            'poster_landscape' => $this->poster_landscape,
            'published' =>$this->created_at->diffForHumans(),
            // 'published' => $this->created_at->format("d F, Y"),
            // 'link' => route('notes.show', [$this->subject->slug, $this->slug])
        ];
    }
}

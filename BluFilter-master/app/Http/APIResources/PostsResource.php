<?php

namespace App\Http\APIResources;

use Illuminate\Http\Resources\Json\JsonResource;
use Str;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'brief' => $this->brief,
            // 'body' => strip_tags(Str::words($this->body, 20, '...')),
            'body' => $this->body,
            'featured_image' => $this->featured_image,
            'author' => new PostAuthorResource($this->author)
        ];
    }
}

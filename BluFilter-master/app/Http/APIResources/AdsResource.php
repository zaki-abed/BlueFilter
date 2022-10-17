<?php

namespace App\Http\APIResources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
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
            'brief' => $this->brief,
            'body' => strip_tags($this->body),
            // 'body' => $this->body,
            'featured_image' => $this->featured_image,
            'lang' => $this->lang
        ];
    }
}

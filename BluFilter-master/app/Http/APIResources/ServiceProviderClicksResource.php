<?php

namespace App\Http\APIResources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderClicksResource extends JsonResource
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
            'click_count' => $this->click_count
        ];
    }
}

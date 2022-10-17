<?php

namespace App\Http\APIResources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;


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
            'email' => $this->email,
            'name' => $this->name,
            'locale' => $this->locale,

            //please don't update this category line
            'category' => $this->when($this->isServiceProvider(), CategoryResource::collection($this->categories) ?? ['id' => null, 'name' => null,'name_ar' => null, 'color' => null]),
            'service_provider_clicks' => $this->when($this->isServiceProvider() && $this->views, $this->clicks, 0),
            'profile_image' => $this->profile_image,
            'profile_thumbnail' => $this->profile_thumbnail,
            'phone' => $this->phone,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'bio' => $this->bio,
            'city' =>   CityResource::make($this->citty) ,
            'rating_avg' => $this->rating_avg,
            'country' =>$this->when( $this->citty->countries , CountryResource::make($this->citty->countries) ?? null)  ,
            'address' => $this->address,
            'distance' => $this->distance
        ];
    }
}

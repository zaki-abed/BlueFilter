<?php

namespace App\Http\APIResources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserMainDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'locale' => $this->locale,
            'category' => $this->when($this->isServiceProvider(), CategoryResource::collection($this->categories) ?? ['id' => null, 'name' => null,'name_ar' => null, 'color' => null]),
            'profile_image' => $this->profile_image,
            'profile_thumbnail' => $this->profile_thumbnail,
            'phone' => $this->phone,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'bio' => $this->bio,
            'city' =>   CityResource::make($this->citty) ,
            'country' =>$this->when( $this->citty->countries , CountryResource::make($this->citty->countries) ?? null)  ,
            'address' => $this->address,
        ];
    }
}

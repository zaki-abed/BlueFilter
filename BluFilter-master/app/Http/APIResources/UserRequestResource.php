<?php

namespace App\Http\APIResources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        $array['image'] = $this->image;
        $array['service_provider'] = new UserResource(User::find($this->first()->Service_Provider_ID));
        return $array;   
    }
}

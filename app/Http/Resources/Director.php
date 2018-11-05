<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Director extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'awards' => $this->awards,
            'about' => $this->about,
            'halloffame' => $this->halloffame,
            'profilepic' => $this->profilepic,

        ];
    }
}

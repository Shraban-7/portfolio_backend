<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title"=>$this->title,
            "sub_title1"=>$this->sub_title1,
            "sub_title2"=>$this->sub_title2,
            "sub_title3"=>$this->sub_title3,
            "sub_title4"=>$this->sub_title4,
            "sub_title5"=>$this->sub_title5,
            "image"=>$this->image
        ];
    }
}

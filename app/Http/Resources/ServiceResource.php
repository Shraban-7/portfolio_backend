<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            "image"=>$this->image,
            "description"=>$this->description,
            "meta_title"=>$this->meta_title,
            "meta_tag"=>$this->meta_tag,
            "meta_desc"=>$this->meta_desc
        ];
    }
}

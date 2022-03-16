<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryMediaResource extends JsonResource
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
            'title_bangla' => $this->title_bangla,
            'title_english' => $this->title_english,
            'title_hindi' => $this->title_hindi,
            'medias' => MediaResource::collection($this->medias),
        ];
    }
}

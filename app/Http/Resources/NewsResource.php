<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $newsItem = $this->resource;

        return array(
          'id' => $newsItem->id,
          'title' => $newsItem->title,
          'announce' => $newsItem->announce,
          'text' => $newsItem->text,
          'date' => $newsItem->created_at->format('Y-m-d')

        );
    }
}

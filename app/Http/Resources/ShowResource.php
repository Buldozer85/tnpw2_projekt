<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Show */
class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type->value,
            'name' => $this->name,
            'date_of_premiere' => $this->date_of_premiere->format('d.n.Y'),
            'description' => $this->getTrixRichText('description'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'icon' => $this->icon,
            'rating' => round($this->rating, 2),
            'reviews_number'=> $this->reviews_number,
            'count_of_seasons' => $this->getMeta('count_of_seasons'),
            'count_of_episodes' => $this->getMeta('count_of_episodes'),
            'still_running' => $this->getMeta('still_running'),
            'length' => $this->getMeta('length')
        ];
    }
}

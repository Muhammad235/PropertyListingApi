<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyCharacteristicsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'price' => $this->price,
            'bedrooms' => $this->bedrooms,
            'sqrt' => $this->sqrt,
            'price_sqrt' => $this->price_sqrt,
            'property_type' => $this->property_type,
            'status' => $this->status,
        ];
    }
}

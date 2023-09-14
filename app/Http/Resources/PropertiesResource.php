<?php

namespace App\Http\Resources;

use App\Models\Brokers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $broker = Brokers::find($this->broker_id);

        return [
            'id' => (string) $this->id,
            'attributes' => [
                'broker_id' => $this->broker_id,
                'address' => $this->address,
                'listing_type' => $this->listing_type,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'description' => $this->description,
                'build_year' => $this->build_year,
            ],

            'characteristics' => [
                new PropertyCharacteristicsResource($this->characteristic)
            ],

            "broker" => [
                'name' => $broker->name,
                'address' => $broker->address,
                'phone_number' => $broker->phone_number,
            ]
        ];
    }
}

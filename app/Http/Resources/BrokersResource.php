<?php

namespace App\Http\Resources;

use App\Models\Brokers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrokersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'phone_number' => $this->phone_number,
            'logo_path' => $this->logo_path,
        ];
    }
}

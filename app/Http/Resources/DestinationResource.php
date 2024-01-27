<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'nama_destinasi' => $this->destinationName,
            'image' => $this->image,
            'deskripsi' => $this->description,
            'lokasi' => $this->location,
            'dibuat_pada' => $this->created_at,
            'diedit_pada' => $this->updated_at
        ];
    }
}

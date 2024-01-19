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
        return parent::toArray($request);

        return [
            'nama_destinasi' => $this->destinationName,
            'image' => $this->whenLoaded('imageId'),
            'deskripsi' => $this->description,
            'lokasi' => $this->location
        ];

    }
}

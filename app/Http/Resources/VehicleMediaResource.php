<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleMediaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'DocumentID' => $this->DocumentID,
            'VehicleCode' => $this->VehicleCode,
            'DocumentDescription' => $this->DocumentDescription,
            'DocumentTypeID' => $this->DocumentTypeID,
            'ImageURL' => $this->ImageURL,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}

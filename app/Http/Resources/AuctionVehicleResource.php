<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuctionVehicleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'AuctionVehicleID' => $this->AuctionVehicleID,
            'AuctionCode' => $this->AuctionCode,
            'VehicleID' => $this->VehicleID,
            'Lot' => $this->Lot,
            'ReservePrice' => $this->ReservePrice,
            'Make' => $this->Make,
            'Model' => $this->Model,
            'BuildYear' => $this->BuildYear,
            'Variant' => $this->Variant,
            'VehicleGroup' => $this->VehicleGroup,
            'StructuralGrade' => $this->StructuralGrade,
            'InteriorGrade' => $this->InteriorGrade,
            'EngineGrade' => $this->EngineGrade,
            'SellingCategory' => $this->SellingCategory,
            'BodyType' => $this->BodyType,
            'Gear' => $this->Gear,
            'Color' => $this->Color,
            'Km' => $this->Km,
            'CarOwner' => $this->CarOwner,
            'Drive' => $this->Drive,
            'Register' => $this->Register,
            'Province' => $this->Province,
            'Catalogue' => $this->Catalogue,
            'Catalogue_LO' => $this->Catalogue_LO,
            'CreateBy' => $this->CreateBy,
            'CreateDate' => $this->CreateDate?->format('Y-m-d H:i:s'),
            'UpdateBy' => $this->UpdateBy,
            'UpdateDate' => $this->UpdateDate?->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
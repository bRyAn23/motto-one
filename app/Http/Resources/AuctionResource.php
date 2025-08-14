<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuctionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'AuctionID' => $this->AuctionID,
            'AuctionDate' => $this->AuctionDate->format('Y-m-d'),
            'AuctionCode' => $this->AuctionCode,
            'AuctionDescription' => $this->AuctionDescription,
            'AuctionDescription_LO' => $this->AuctionDescription_LO,
            'AuctionLocation_BU' => $this->AuctionLocation_BU,
            'AuctionLocation_LO' => $this->AuctionLocation_LO,
            'Detail_BU' => $this->Detail_BU,
            'Detail_LO' => $this->Detail_LO,
            'SaleOffice' => $this->SaleOffice,
            'CreateBy' => $this->CreateBy,
            'CreateDate' => $this->CreateDate?->format('Y-m-d H:i:s'),
            'UpdateBy' => $this->UpdateBy,
            'UpdateDate' => $this->UpdateDate?->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
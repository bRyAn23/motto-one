<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuctionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'AuctionDate' => 'required|date',
            'AuctionCode' => 'required|string|unique:auctions,AuctionCode',
            'AuctionDescription' => 'nullable|string',
            'AuctionDescription_LO' => 'nullable|string',
            'AuctionLocation_BU' => 'nullable|string',
            'AuctionLocation_LO' => 'nullable|string',
            'Detail_BU' => 'nullable|string',
            'Detail_LO' => 'nullable|string',
            'SaleOffice' => 'nullable|string',
            'CreateBy' => 'nullable|string',
            'CreateDate' => 'nullable|date',
            'UpdateBy' => 'nullable|string',
            'UpdateDate' => 'nullable|date',

            // Auction Vehicles validation
            'auction_vehicles' => 'required|array',
            'auction_vehicles.*.VehicleID' => 'required|string',
            'auction_vehicles.*.Lot' => 'nullable|string',
            'auction_vehicles.*.ReservePrice' => 'nullable|numeric',
            'auction_vehicles.*.Make' => 'nullable|string',
            'auction_vehicles.*.Model' => 'nullable|string',
            'auction_vehicles.*.BuildYear' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'auction_vehicles.*.Variant' => 'nullable|string',
            'auction_vehicles.*.VehicleGroup' => 'nullable|string',
            'auction_vehicles.*.StructuralGrade' => 'nullable|string',
            'auction_vehicles.*.InteriorGrade' => 'nullable|string',
            'auction_vehicles.*.EngineGrade' => 'nullable|string',
            'auction_vehicles.*.SellingCategory' => 'nullable|string',
            'auction_vehicles.*.BodyType' => 'nullable|string',
            'auction_vehicles.*.Gear' => 'nullable|string',
            'auction_vehicles.*.Color' => 'nullable|string',
            'auction_vehicles.*.Km' => 'nullable|integer|min:0',
            'auction_vehicles.*.CarOwner' => 'nullable|integer',
            'auction_vehicles.*.Drive' => 'nullable|string',
            'auction_vehicles.*.Register' => 'nullable|string',
            'auction_vehicles.*.Province' => 'nullable|string',
            'auction_vehicles.*.Catalogue' => 'nullable|string',
            'auction_vehicles.*.Catalogue_LO' => 'nullable|string',
            'auction_vehicles.*.CreateBy' => 'nullable|string',
            'auction_vehicles.*.CreateDate' => 'nullable|date',
            'auction_vehicles.*.UpdateBy' => 'nullable|string',
            'auction_vehicles.*.UpdateDate' => 'nullable|date',

            // Vehicle Media validation
            'auction_vehicles.*.vehicle_media' => 'nullable|array',
            'auction_vehicles.*.vehicle_media.*.DocumentDescription' => 'nullable|string',
            'auction_vehicles.*.vehicle_media.*.DocumentTypeID' => 'nullable|integer',
            'auction_vehicles.*.vehicle_media.*.ImageURL' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'AuctionCode.required' => 'Auction code is required',
            'AuctionCode.unique' => 'Auction code already exists',
            'AuctionDate.required' => 'Auction date is required',
            'auction_vehicles.required' => 'At least one vehicle is required',
            'auction_vehicles.*.VehicleID.required' => 'Vehicle ID is required for each vehicle',
            'auction_vehicles.*.VehicleID.unique' => 'Vehicle ID must be unique'
        ];
    }
}

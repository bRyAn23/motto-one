<?php
// app/Http/Controllers/Api/V1/AuctionController.php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAuctionRequest;
use App\Http\Resources\AuctionResource;
use App\Http\Resources\AuctionVehicleResource;
use App\Http\Resources\VehicleDetailResource;
use App\Models\Auction;
use App\Models\AuctionVehicle;
use App\Models\VehicleMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Illuminate\Log\log;

class AuctionController extends Controller
{
    /**
     * Create a new auction with vehicles and media
     */
    public function createAuction(CreateAuctionRequest $request)
    {
        try {
            DB::beginTransaction();

            // Create auction
            $auction = Auction::create($request->safe()->only([
                'AuctionDate',
                'AuctionCode',
                'AuctionDescription',
                'AuctionDescription_LO',
                'AuctionLocation_BU',
                'AuctionLocation_LO',
                'Detail_BU',
                'Detail_LO',
                'SaleOffice',
                'CreateBy',
                'CreateDate',
                'UpdateBy',
                'UpdateDate'
            ]));

            // Create auction vehicles and their media
            foreach ($request->safe()->auction_vehicles as $vehicleData) {
                $vehicleData['AuctionCode'] = $auction->AuctionCode;

                $vehicle = AuctionVehicle::create(collect($vehicleData)->except('vehicle_media')->toArray());
                log()->info('Created AuctionVehicle: ' . $vehicle->AuctionVehicleID);
                // Create vehicle media if provided
                if (isset($vehicleData['vehicle_media']) && is_array($vehicleData['vehicle_media'])) {
                    foreach ($vehicleData['vehicle_media'] as $mediaData) {
                        $mediaData['VehicleCode'] = $vehicle->AuctionVehicleID;
                        VehicleMedia::create($mediaData);
                    }
                }
            }

            DB::commit();

            // Load relationships for response
            $auction->load(['auctionVehicles.vehicleMedia']);

            return response()->json([
                'success' => true,
                'message' => 'Auction created successfully',
                'data' => new AuctionResource($auction)
            ], 201);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Error creating auction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get auction list by date
     */
    public function getAuctionListByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        $auctions = Auction::whereDate('AuctionDate', $request->date)
            ->orderBy('AuctionDate')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Auctions retrieved successfully',
            'data' => AuctionResource::collection($auctions),
            'count' => $auctions->count()
        ]);
    }

    /**
     * Get all auctions
     */
    public function getAllAuctions()
    {
        $auctions = Auction::orderBy('AuctionDate', 'desc')->get();

         $vehicleCounts = DB::table('auction_vehicles')
        ->select('AuctionCode', 'SellingCategory', DB::raw('COUNT(*) as count'))
        ->whereIn('AuctionCode', $auctions->pluck('AuctionCode'))
        ->groupBy('AuctionCode', 'SellingCategory')
        ->get()
        ->groupBy('AuctionCode');

         // Add vehicle counts to each auction
        $auctions->each(function($auction) use ($vehicleCounts) {
            $auctionVehicles = $vehicleCounts->get($auction->AuctionCode, collect());

            $vehiclesByCategory = $auctionVehicles->pluck('count', 'SellingCategory');
            $totalVehicles = $auctionVehicles->sum('count');

            $auction->vehicle_count_by_category = $vehiclesByCategory;
            $auction->total_vehicles = $totalVehicles;
        });
        log()->info($auctions->toArray());
        return response()->json([
            'success' => true,
            'message' => 'All auctions retrieved successfully',
            'data' => $auctions,
            'count' => $auctions->count()
        ]);
    }

    /**
     * Get vehicle list by auction code
     */
    public function getVehicleListByAuctionCode(Request $request)
    {
        $request->validate([
            'auction_code' => 'required|string|exists:auctions,AuctionCode'
        ]);

        $vehicles = AuctionVehicle::where('AuctionCode', $request->auction_code)
            ->orderBy('Lot')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Vehicles retrieved successfully',
            'data' => AuctionVehicleResource::collection($vehicles),
            'count' => $vehicles->count()
        ]);
    }

    /**
     * Get vehicle detail by vehicle code with nested media
     */
    public function getVehicleDetailByCode(Request $request)
    {
        $request->validate([
            'vehicle_code' => 'required|string|exists:auction_vehicles,VehicleID'
        ]);

        $vehicle = AuctionVehicle::where('VehicleID', $request->vehicle_code)
            ->with('vehicleMedia')
            ->first();

        if (!$vehicle) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Vehicle detail retrieved successfully',
            'data' => new VehicleDetailResource($vehicle)
        ]);
    }
}

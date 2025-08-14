<?php
use App\Http\Controllers\Api\V1\AuctionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    
    // Auction Routes
    Route::post('/auctions', [AuctionController::class, 'createAuction']);
    Route::get('/auctions', [AuctionController::class, 'getAllAuctions']);
    Route::get('/auctions/by-date', [AuctionController::class, 'getAuctionListByDate']);
    Route::get('/vehicles/by-auction', [AuctionController::class, 'getVehicleListByAuctionCode']);
    Route::get('/vehicles/detail', [AuctionController::class, 'getVehicleDetailByCode']);
    
});
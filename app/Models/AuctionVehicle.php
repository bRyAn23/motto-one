<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $AuctionVehicleID
 * @property string $AuctionCode
 * @property string $VehicleID
 * @property string|null $Lot
 * @property numeric|null $ReservePrice
 * @property string|null $Make
 * @property string|null $Model
 * @property int|null $BuildYear
 * @property string|null $Variant
 * @property string|null $VehicleGroup
 * @property string|null $StructuralGrade
 * @property string|null $InteriorGrade
 * @property string|null $EngineGrade
 * @property string|null $SellingCategory
 * @property string|null $BodyType
 * @property string|null $Gear
 * @property string|null $Color
 * @property int|null $Km
 * @property int|null $CarOwner
 * @property string|null $Drive
 * @property string|null $Register
 * @property string|null $Province
 * @property string|null $Catalogue
 * @property string|null $Catalogue_LO
 * @property string|null $CreateBy
 * @property \Illuminate\Support\Carbon|null $CreateDate
 * @property string|null $UpdateBy
 * @property \Illuminate\Support\Carbon|null $UpdateDate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Auction $auction
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VehicleMedia> $vehicleMedia
 * @property-read int|null $vehicle_media_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereAuctionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereAuctionVehicleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereBodyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereBuildYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereCarOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereCatalogue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereCatalogueLO($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereCreateBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereDrive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereEngineGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereGear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereInteriorGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereKm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereReservePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereSellingCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereStructuralGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereUpdateBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereUpdateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereVehicleGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionVehicle whereVehicleID($value)
 * @mixin \Eloquent
 */
class AuctionVehicle extends Model
{
    protected $primaryKey = 'AuctionVehicleID';
    public $incrementing = true;
    protected $fillable = [
        'AuctionCode',
        'VehicleID',
        'Lot',
        'ReservePrice',
        'Make',
        'Model',
        'BuildYear',
        'Variant',
        'VehicleGroup',
        'StructuralGrade',
        'InteriorGrade',
        'EngineGrade',
        'SellingCategory',
        'BodyType',
        'Gear',
        'Color',
        'Km',
        'CarOwner',
        'Drive',
        'Register',
        'Province',
        'Catalogue',
        'Catalogue_LO',
        'CreateBy',
        'CreateDate',
        'UpdateBy',
        'UpdateDate'
    ];

    protected $casts = [
        'ReservePrice' => 'decimal:2',
        'BuildYear' => 'integer',
        'Km' => 'integer',
        'CarOwner' => 'integer',
        'CreateDate' => 'datetime',
        'UpdateDate' => 'datetime'
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'AuctionCode', 'AuctionCode');
    }

    public function vehicleMedia()
    {
        return $this->hasMany(VehicleMedia::class, 'VehicleCode', 'AuctionVehicleID');
    }
}

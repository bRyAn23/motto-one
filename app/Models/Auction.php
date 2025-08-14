<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $AuctionID
 * @property \Illuminate\Support\Carbon $AuctionDate
 * @property string $AuctionCode
 * @property string|null $AuctionDescription
 * @property string|null $AuctionDescription_LO
 * @property string|null $AuctionLocation_BU
 * @property string|null $AuctionLocation_LO
 * @property string|null $Detail_BU
 * @property string|null $Detail_LO
 * @property string|null $SaleOffice
 * @property string|null $CreateBy
 * @property \Illuminate\Support\Carbon|null $CreateDate
 * @property string|null $UpdateBy
 * @property \Illuminate\Support\Carbon|null $UpdateDate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AuctionVehicle> $auctionVehicles
 * @property-read int|null $auction_vehicles_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereAuctionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereAuctionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereAuctionDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereAuctionDescriptionLO($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereAuctionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereAuctionLocationBU($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereAuctionLocationLO($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereCreateBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereDetailBU($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereDetailLO($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereSaleOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereUpdateBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereUpdateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Auction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Auction extends Model
{
    protected $primaryKey = 'AuctionID';
    
    protected $fillable = [
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
    ];

    protected $casts = [
        'AuctionDate' => 'date',
        'CreateDate' => 'datetime',
        'UpdateDate' => 'datetime'
    ];

    public function auctionVehicles()
    {
        return $this->hasMany(AuctionVehicle::class, 'AuctionCode', 'AuctionCode');
    }
}

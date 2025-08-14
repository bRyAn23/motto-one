<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $DocumentID
 * @property integer $VehicleCode
 * @property string|null $DocumentDescription
 * @property int|null $DocumentTypeID
 * @property string|null $ImageURL
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AuctionVehicle $auctionVehicle
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia whereDocumentDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia whereDocumentID($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia whereDocumentTypeID($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia whereImageURL($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleMedia whereVehicleCode($value)
 * @mixin \Eloquent
 */
class VehicleMedia extends Model
{
    protected $table = 'vehicle_media';
    protected $primaryKey = 'DocumentID';

    protected $fillable = [
        'VehicleCode',
        'DocumentDescription',
        'DocumentTypeID',
        'ImageURL'
    ];

    protected $casts = [
        'DocumentTypeID' => 'integer',
        'VehicleCode' => 'integer'
    ];


    public function auctionVehicle()
    {
        return $this->belongsTo(AuctionVehicle::class, 'VehicleCode', 'AuctionVehicleID');
    }
}

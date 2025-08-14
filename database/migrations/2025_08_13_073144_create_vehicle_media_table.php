<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehicle_media', function (Blueprint $table) {
            $table->id('DocumentID');
            $table->integer('VehicleCode');
            $table->string('DocumentDescription')->nullable();
            $table->integer('DocumentTypeID')->nullable();
            $table->text('ImageURL')->nullable();
            $table->timestamps();

            $table->foreign('VehicleCode')->references('AuctionVehicleID')->on('auction_vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_media');
    }
};

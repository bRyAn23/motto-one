<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_vehicles', function (Blueprint $table) {
            $table->id('AuctionVehicleID'); // Primary key for this table
            $table->string('AuctionCode'); // Foreign key part 1
            $table->string('VehicleID'); // Foreign key part 2 (also part of composite unique key)
            $table->string('Lot')->nullable();
            $table->decimal('ReservePrice', 15, 2)->nullable();
            $table->string('Make')->nullable();
            $table->string('Model')->nullable();
            $table->year('BuildYear')->nullable();
            $table->string('Variant')->nullable();
            $table->string('VehicleGroup')->nullable();
            $table->string('StructuralGrade')->nullable();
            $table->string('InteriorGrade')->nullable();
            $table->string('EngineGrade')->nullable();
            $table->string('SellingCategory')->nullable();
            $table->string('BodyType')->nullable();
            $table->string('Gear')->nullable();
            $table->string('Color')->nullable();
            $table->integer('Km')->nullable();
            $table->integer('CarOwner')->nullable();
            $table->string('Drive')->nullable();
            $table->string('Register')->nullable();
            $table->string('Province')->nullable();
            $table->text('Catalogue')->nullable();
            $table->text('Catalogue_LO')->nullable();
            $table->string('CreateBy')->nullable();
            $table->timestamp('CreateDate')->nullable();
            $table->string('UpdateBy')->nullable();
            $table->timestamp('UpdateDate')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns

            // Add the foreign key constraint to the 'auctions' table
            // Assuming 'auctions' table has a 'AuctionCode' column that is unique or primary.
            $table->foreign('AuctionCode')->references('AuctionCode')->on('auctions')->onDelete('cascade');

            // Add a composite unique index on AuctionCode and VehicleID
            // This ensures that for a given AuctionCode, each VehicleID is unique.
            $table->unique(['AuctionCode', 'VehicleID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction_vehicles');
    }
};

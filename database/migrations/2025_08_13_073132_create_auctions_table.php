<?php
// database/migrations/2024_01_01_000001_create_auctions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id('AuctionID');
            $table->date('AuctionDate');
            $table->string('AuctionCode')->unique();
            $table->text('AuctionDescription')->nullable();
            $table->text('AuctionDescription_LO')->nullable();
            $table->string('AuctionLocation_BU')->nullable();
            $table->string('AuctionLocation_LO')->nullable();
            $table->text('Detail_BU')->nullable();
            $table->text('Detail_LO')->nullable();
            $table->string('SaleOffice')->nullable();
            $table->string('CreateBy')->nullable();
            $table->timestamp('CreateDate')->nullable();
            $table->string('UpdateBy')->nullable();
            $table->timestamp('UpdateDate')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auctions');
    }
};
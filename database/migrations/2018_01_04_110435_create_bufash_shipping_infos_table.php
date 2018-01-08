<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBufashShippingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bufash_shipping_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('HouseNo_BldgNo');
            $table->string('Street');
            $table->string('Zone');
            $table->string('Town');
            $table->string('State_or_Province');
            $table->string('Country');
            $table->integer('ZipCode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bufash_shipping_infos');
    }
}

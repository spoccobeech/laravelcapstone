<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BufashItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('BufashItems', function (Blueprint $table) {
        $table->increments('id');
        // $table->string('rowId')->unique();
        $table->string('item_name');
        $table->string('item_type');
        $table->string('item_size');
        $table->string('item_qty');
        $table->string('item_stocks');
        $table->string('item_desc');
        $table->string('item_price');
        $table->string('item_image');
        $table->rememberToken();
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
        //
    }
}

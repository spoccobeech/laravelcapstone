<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class bufashproducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bufashproducts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('prod_name');
          $table->string('prod_type');
          $table->string('prod_qty');
          $table->string('prod_desc');
          $table->string('prod_price');
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

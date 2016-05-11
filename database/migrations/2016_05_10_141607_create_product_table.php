<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function(Blueprint $table)
        {
            $table->increments('product_id');
            $table->string('product_name',275);
            $table->string('img',275);
            $table->integer('price');
            $table->string('product_description',275);
            $table->integer('discount');
            $table->string('modifiedby');
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
            Schema::drop('products');
    }
}

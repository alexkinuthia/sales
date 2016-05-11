<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function(Blueprint $table)
        {           
            $table->increments('Booking_id');
            $table->integer('product_name');
            $table->integer('user_email');
            $table->date('expirydate');
            // $table->integer('')->nullable();
            $table->timestamps();
            $table->primary('Booking_id');
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

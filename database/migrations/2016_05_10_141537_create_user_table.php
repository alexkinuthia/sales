<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('user_id');
            $table->string('Email',100);
            $table->string('FName',100);
            $table->string('MName',100);
            $table->string('LName',100);
            $table->string('mobileNo',20);
            $table->unique('Email');
            $table->unique('mobileNo');
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
        Schema::table('users', function (Blueprint $table) {
    $table->dropPrimary('user_id');
});
        Schema::drop('users');
    
    }
}

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
        Schema::create('Customers', function (Blueprint $table) {
            $table->bigIncrements('C_id');
            $table->string('C_name');
            $table->string('C_email')->unique;
            $table->string('C_phone');
            $table->string('C_address');
            $table->string('C_password');
            $table->unsignedBigInteger('A_id');
            $table->foreign('A_id')->references('A_id')->on('Admins');
    });

    Schema::create('CO_mappings', function (Blueprint $table) {
        $table->bigIncrements('COM_id');
        
        $table->unsignedBigInteger('C_id');
        $table->foreign('C_id')->references('C_id')->on('Customers');

        $table->unsignedBigInteger('O_id');
        $table->foreign('O_id')->references('O_id')->on('Orders');


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
};

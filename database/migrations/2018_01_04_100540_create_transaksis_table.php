<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petugas_id')->unsigned();
            $table->integer('pengunjungs_id')->unsigned();
            $table->string('cekin');
            $table->integer('kamars_id')->unsigned();
             $table->integer('totalharga');

            
            

            $table->timestamps();

             $table->foreign('pengunjungs_id')->references('id')->on('pengunjungs')->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('kamars_id')->references('id')->on('typekamars')->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('petugas_id')->references('id')->on('petugas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}

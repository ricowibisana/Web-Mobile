<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->integer('id_ruang')->unsigned();
            $table->string('nama_barang', 100);
            $table->integer('total_barang');
            $table->integer('rusak_barang');
            $table->string('foto', 100)->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();

            $table->foreign('id_ruang')->references('id_ruang')->on('ruangan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('created_by')->references('id')->on('user')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('updated_by')->references('id')->on('user')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *S
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}

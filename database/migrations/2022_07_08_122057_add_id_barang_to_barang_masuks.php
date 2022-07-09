<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdBarangToBarangMasuks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuks', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('barang_id')->nullable()->after('nama_barang');
            $table->foreign('barang_id')->references('id')->on('data_barangs')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_masuks', function (Blueprint $table) {
            //
            $table->dropForeign('barang_id');
            $table->dropColumn(['barang_id']);
        });
    }
}

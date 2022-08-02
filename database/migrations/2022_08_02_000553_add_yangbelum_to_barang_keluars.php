<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYangbelumToBarangKeluars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            //

            
            $table->string('size')->nullable()->after('jumlah');

            $table->string('merk')->nullable()->after('nama_supplier');

            $table->string('harga_satuan')->nullable()->after('merk');

            $table->string('harga_beli')->nullable()->after('harga_satuan');

            $table->string('satuan')->nullable()->after('harga_beli');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            //
        });
    }
}

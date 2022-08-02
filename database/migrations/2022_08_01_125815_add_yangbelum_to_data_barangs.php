<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYangbelumToDataBarangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_barangs', function (Blueprint $table) {
            //
            $table->string('size')->nullable()->after('total_stock');

            $table->string('merk')->nullable()->after('nama_supplier');

            $table->string('harga_satuan')->nullable()->after('merk');

            $table->string('harga_beli')->nullable()->after('harga_satuan');

            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_barangs', function (Blueprint $table) {
            //

            $table->dropColumn(['size']);
            $table->dropColumn(['merk']);
            $table->dropColumn(['harga_satuan']);
            $table->dropColumn(['harga_beli']);
        });
    }
}

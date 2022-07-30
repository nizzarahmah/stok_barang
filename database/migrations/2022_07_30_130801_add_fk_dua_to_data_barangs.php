<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkDuaToDataBarangs extends Migration
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
            $table->unsignedBigInteger('id_kategori')->nullable()->after('id');
            $table->foreign('id_kategori')->references('id')->on('kategoribarangs')->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropForeign('id_kategori');
            $table->dropColumn(['id_kategori']);
        });
    }
}

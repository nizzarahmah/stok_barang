<?php

namespace App\Http\Controllers;

use App\Models\Barang_keluar;
use App\Models\Barang_masuk;
use App\Models\Data_barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //


    public function index()
    {
        # code...

        return view('admin.home');

    }



    public function data_barang()
    {
        # code...

        $barang = Data_barang::all();
        return view('admin.data_barang', compact('barang'));

    }


    public function supplier()
    {
        # code...

        $supplier = Supplier::all();
        return view('admin.supplier', compact('supplier'));

    }



    public function barang_masuk()
    {
        # code...

        $barang_masuk = Barang_masuk::all();
        return view('admin.data_barang_masuk', compact('barang_masuk'));

    }




    public function barang_keluar()
    {
        # code...

        $barang_keluar = Barang_keluar::all();
        return view('admin.data_barang_keluar', compact('barang_keluar'));

    }


}

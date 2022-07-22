<?php

namespace App\Http\Controllers;

use App\Models\Barang_keluar;
use App\Models\Barang_masuk;
use App\Models\Data_barang;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;


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




    // Tampilkan Semua User




    public function tampilkan_user()
    {
        # code...

        $users = User::all();

        return view('admin.data_user', compact('users'));

    }


    public function kelompok_user()
    {
        # code...

        $users = User::all();

        return view('admin.kelompok_user', compact('users'));

    }



    // BERBAGAI LAPORAN

    public function laporan_stok_barang()
    {
        # code...

        $barang = Data_barang::all();
        return view('admin.laporan.data_barang', compact('barang'));

    }



    public function laporan_barang_masuk()
    {
        # code...

        $barang_masuk = Barang_masuk::all();
        return view('admin.laporan.data_barang_masuk', compact('barang_masuk'));


    }


    public function laporan_barang_keluar()
    {
        # code...
        $barang_keluar = Barang_keluar::all();

        return view('admin.laporan.data_barang_keluar', compact('barang_keluar'));



    }


    public function laporan_akhir()
    {
        # code...



    }




    //CETAK LAPORAN 

    public function cetak_barang_pdf()
    {
        # code...

        $barang = Data_barang::all();

        $data_pdf =  PDF::loadview('admin.laporan.data_barang_pdf', compact('barang'));

        // return $data_pdf->download('laporan_barang_pdf');

        return $data_pdf->stream();


    }





    














}

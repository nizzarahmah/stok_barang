<?php

namespace App\Http\Controllers;

use App\Models\Barang_keluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $barang_keluar = Barang_keluar::all();

        return view('admin.data_barang_keluar', compact('barang_keluar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.data_barang_keluar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $barang_keluar = new Barang_keluar();

        $barang_keluar->nama_barang = $request['nama_barang'];

        $barang_keluar->barang_id = $request['barang_id'];

        $barang_keluar->nama_supplier = $request['nama_supplier'];

        $barang_keluar->tanggal_keluar = $request['tanggal_keluar'];

        $barang_keluar->jumlah = $request['jumlah'];


        
        $barang_keluar->merk = $request['merk'];

        $barang_keluar->harga_satuan = $request['harga_satuan'];

        $barang_keluar->size = $request['size'];


        $barang_keluar->harga_beli = ($barang_keluar->size)*($barang_keluar->harga_satuan); 



        $barang_keluar->save();

        return redirect('/barang_keluar')->with('sukses_tambah_barang_keluar', 'Sukses Tambah Barang Keluar');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_keluar $barang_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_keluar $barang_keluar, $id)
    {
        //

        $barang_keluar = Barang_keluar::findOrFail($id);

        return view('admin.data_barang_keluar_edit', compact('barang_keluar'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_keluar $barang_keluar, $id)
    {
        //

        Barang_keluar::where('id', $id)->update([

            'nama_barang'=>$request['nama_barang'],

        ]);

        return redirect('/barang_keluar/' . $id)->with('sukses_update_barang_keluar','Barang Keluar Telah Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $barang_keluar = Barang_keluar::findOrFail($id);

        $barang_keluar->delete();

        return redirect('/barang_keluar')->with('sukses_delete_barang_keluar','Barang Keluar Telah Diupdate');;


    }
}

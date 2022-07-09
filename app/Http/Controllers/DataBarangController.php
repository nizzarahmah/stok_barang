<?php

namespace App\Http\Controllers;

use App\Models\Data_barang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data_barang = Data_barang::all();
        return view('admin.data_barang', compact('data_barang'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.data_barang');

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
        $data_barang = new Data_barang;

        $data_barang->nama_barang = $request['nama_barang'];

        $data_barang->kode_barang = $request['kode_barang'];

        $data_barang->nama_supplier = $request['nama_supplier'];

        $data_barang->total_stock = $request['total_stock'];

        $data_barang->save();

        return redirect('/data_barang')->with('sukses_tambah_barang','Barang Telah Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data_barang  $data_barang
     * @return \Illuminate\Http\Response
     */
    public function show(Data_barang $data_barang)
    {
        //




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data_barang  $data_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Data_barang $data_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data_barang  $data_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data_barang $data_barang, $id)
    {
        //

       Data_barang::where('id',$id)->update([

        'nama_barang'=>$request['nama_barang'],
        'kode_barang'=>$request['kode_barang'],
        'nama_supplier'=>$request['nama_supplier'],
        'total_stock'=>$request['total_stock'],


       ]);

       return redirect('/data_barang/'.$id)->with('success_edit_barang','Data Barang Berhasil Diedit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data_barang  $data_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $data_barang = Data_barang::findOrFail($id);

        $data_barang->delete();
        return redirect('/data_barang')->with('sukses_hapus_data_barang', 'Sukses Hapus Data Barang');


        


    }
}

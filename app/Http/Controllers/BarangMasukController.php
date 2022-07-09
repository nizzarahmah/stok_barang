<?php

namespace App\Http\Controllers;

use App\Models\Barang_masuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $barang_masuk = Barang_masuk::all();
        return view('admin.data_barang_masuk', compact('barang_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.barang_masuk');
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

        $barang_masuk = new Barang_masuk();

        $barang_masuk->id_supplier = $request['id_supplier'];

        $barang_masuk->nama_barang = $request['nama_barang'];

        $barang_masuk->barang_id = $request['barang_id'];

        $barang_masuk->nama_supplier = $request['nama_supplier'];

        $barang_masuk->tanggal_masuk = $request['tanggal_masuk'];

        $barang_masuk->jumlah_stock = $request['jumlah_stock'];


        $barang_masuk->save();

        return redirect('barang_masuk')->with('sukses_tambah_barang_masuk', 'Barang Masuk Telah Ditambahkan');

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_masuk $barang_masuk, $id)
    {
        //

        $barang_masuk = Barang_masuk::findOrFail($id);

        return view('admin.data_barang_masuk_edit', compact('barang_masuk'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_masuk $barang_masuk, $id)
    {
        //

        Barang_masuk::where('id', $id)->create([

            'id_supplier'=>$request['id_supplier'],
            'nama_barang'=>$request['nama_barang'],
            'barang_id'=>$request['barang_id'],
            'nama_supplier'=>$request['nama_supplier'],
            'tanggal_masuk'=>$request['tanggal_masuk'],
            'jumlah_stock'=>$request['jumlah_stock'],


        ]);

        return redirect('/barang_masuk/' . $id)->with('sukses_update_barang_masuk', 'Data telah diupdate');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_masuk $barang_masuk, $id)
    {
        //

        $barang_masuk = Barang_masuk::findOrFail($id);

        $barang_masuk->delete();

        return redirect('/barang_masuk')->with('sukses_hapus_barang_masuk', 'Barang Masuk telah dihapus');

    }
}

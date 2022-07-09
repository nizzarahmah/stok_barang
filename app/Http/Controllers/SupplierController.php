<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $supplier = Supplier::all();
        return view('admin.supplier', compact('supplier'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$

        $supplier = new Supplier();

        $supplier->nama_supplier = $request['nama_supplier'];

        $supplier->tanggal_masuk = $request['tanggal_masuk'];

        $supplier->nama_barang = $request['nama_barang'];

        
        $supplier->jumlah = $request['jumlah'];
        $supplier->save();

        return redirect('/data_supplier')->with('sukses_tambah_supplier','Supplier Telah Ditambahkan');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier, $id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        return view('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier, $id)
    {
        //

        Supplier::where('id', $id)->update([

            'nama_supplier'=>$request['nama_supplier'],
            'tanggal_masuk'=>$request['tanggal_masuk'],
            'nama_barang'=>$request['nama_barang'],
            'jumlah'=>$request['jumlah'],
            
        ]);

        return redirect('/data_supplier/' . $id)->with('sukses_update_supplier', ' Supplier Telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect('data_supplier')->with('sukses_hapus_supplier', 'Supplier Telah Dihapus');

    }
}

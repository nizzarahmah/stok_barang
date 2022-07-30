<?php

namespace App\Http\Controllers;

use App\Models\Kategoribarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoribarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoribarang = Kategoribarang::all();
        return view('admin.data_kategori',compact('kategoribarang'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.data_kategori');

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

        $kategoribarang = new Kategoribarang();

        $kategoribarang->nama_kategori = $request['nama_kategori'];

        $nama_kategori_barang = $kategoribarang->nama_kategori ;

      

    

        $dapatkan_terakhir = DB::table('kategoribarangs')->latest('created_at')->first();

        $dapatkan_id = (int) $dapatkan_terakhir->id;

        $dapatkan_sekarang = $dapatkan_id + 1;


        $awal_nama_kategori = $nama_kategori_barang[0] .''. $nama_kategori_barang[1] . ' - ' . $dapatkan_sekarang;


        $kategoribarang->kode_kategori = $awal_nama_kategori;

        $kategoribarang->save();

        return redirect('/kategori_barang')->with('suksestambahkategori','Kategori Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategoribarang  $kategoribarang
     * @return \Illuminate\Http\Response
     */
    public function show(Kategoribarang $kategoribarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategoribarang  $kategoribarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategoribarang $kategoribarang, $id)
    {
        //

        $kategoribarang = Kategoribarang::findOrFail($id);

        return view('admin.data_kategori_id',compact('kategoribarang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategoribarang  $kategoribarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        

        Kategoribarang::where('id', $id)->update([
            'nama_kategori'=>$request['nama_kategori'],
            'kode_kategori'=>$request['kode_kategori'],
        ]);

        return redirect('/kategori_barang')->with('updatesukseskategori','Sukses Update Kategori Barang');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategoribarang  $kategoribarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategoribarang $kategoribarang, $id)
    {
        //
$kategoribarang = Kategoribarang::findOrFail($id);

$kategoribarang->delete();

return redirect('/kategori_barang')->with('sukseshapuskategori','Kategori Barang berhasil terhapus');
        


    }
}

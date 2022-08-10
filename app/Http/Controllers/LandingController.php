<?php

namespace App\Http\Controllers;

use App\Models\Barang_keluar;
use App\Models\Barang_masuk;
use App\Models\Data_barang;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;


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

    public function TambahUser(Request $request)
    {
        # code...

        $users = new User();

        $users['name'] = $request->name;
        $users['email'] = $request->email;
        $users['password'] = bcrypt($request->password);

        if ($request->status == 1) {
            # code...
            $users['is_superadmin'] = 1;
        }

        elseif($request->status == 1)
        {
            $users['is_admin'] = 1;

        }

        else{
            $users['is_admin'] = 1;
        }
       


        $users->save();

        return redirect('/data_user')->with('suksestambahuser','User Telah Ditambahkan');

    }



    public function HapusUser($id)
    {
        # code...

        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/data_user')->with('sukseshapususer', 'User Berhasil Dihapus');


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



    public function cetak_barang_masuk(Request $request)
    {
        # code...

        // $barang_masuk = Barang_masuk::all();

        $tanggal_awal = $request->get('tanggal_awal');
        $tanggal_akhir = $request->get('tanggal_akhir');

        // $tanggal_awal = Input::get('tanggal_awal');

        // $barang_keluar = Barang_keluar::all();

        $barang_masuk = Barang_masuk::whereBetween('tanggal_masuk',[$tanggal_awal,$tanggal_akhir])->get();

        $data_pdf =  PDF::loadview('admin.laporan.barang_masuk_pdf', compact('barang_masuk'));

        // return $data_pdf->download('laporan_barang_pdf');

        return $data_pdf->stream();

    }



    public function cetak_barang_keluar()
    {
        # code...

        $tanggal_awal = $_GET['tanggal_awal'];
        $tanggal_akhir = $_GET['tanggal_akhir'];

        // $barang_keluar = Barang_keluar::all();

        $barang_keluar = Barang_keluar::whereBetween('tanggal_keluar',[$tanggal_awal,$tanggal_akhir])->get();

        $data_pdf =  PDF::loadview('admin.laporan.barang_keluar_pdf', compact('barang_keluar'));

        // return $data_pdf->download('laporan_barang_pdf');

        return $data_pdf->stream();


    }


    public function filtered_masukan(Request $request)
    {
        
        # code...

        $tanggal_awal = $request->get('tanggal_awal');

        $tanggal_akhir = $request->get('tanggal_akhir');

        $barang_masuk = Barang_masuk::whereBetween('tanggal_masuk',[$tanggal_awal,$tanggal_akhir])->get();


        // $tanggal_masuk = $request->get('tanggal_masuk'); 

        // $barang_masuk= DB::table('barang_masuks')->where('tanggal_masuk','like',"%". $tanggal_masuk."%")->get();

        return view('admin.laporan.data_barang_masuk_filtered', ['barang_masuk'=>$barang_masuk]);


    }


    

    public function filtered_luaran(Request $request)
    {
        
        # code...

        $tanggal_awal = $request->get('tanggal_awal');

        $tanggal_akhir = $request->get('tanggal_akhir');

        $barang_keluar = Barang_keluar::whereBetween('tanggal_keluar',[$tanggal_awal,$tanggal_akhir])->get();


        // $tanggal_masuk = $request->get('tanggal_masuk'); 

        // $barang_masuk= DB::table('barang_masuks')->where('tanggal_masuk','like',"%". $tanggal_masuk."%")->get();

        return view('admin.laporan.data_barang_keluar_filtered', ['barang_keluar'=>$barang_keluar]);


    }























}

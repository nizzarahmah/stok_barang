@extends('template')


@section('title')
    Data Barang Masuk
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang Masuk</h1>
    
    

            <a href="/laporan_barang_masuk_semua/pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i
                class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Barang Masuk</a>


    
    
    </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
            </div>
            <div class="card-body">

                <div class="form-group">
                <form action="/laporan_barang_masuk/filtered_masukan" method = "GET">
                    <div class="row">
                        <div class="col-3"> <label for="tanggal_awal">Tanggal Awal</label><input id = "tanggal_awal" type="date" name = "tanggal_awal" class = "form-control" placeholder = "Tanggal Awal"></div>
                        <div class="col-3"><label for="tanggal_akhir">Akhir</label><input id = "tanggal_akhir" type="date" name = "tanggal_akhir" class = "form-control" placeholder = "Tanggal Akhir"></div>
                        <div class="col-3"><label for="button_submit"></label> <br><button id = "button_submit" class = "btn btn-primary mt-2" type = "submit">Pilih Tanggal</button></div>
                    </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Total Stock</th>

                                
                                <th>Nama Merk</th>
                                <th>Harga Satuan</th>
                                <th>Ukuran</th>
                                <th>Harga Total</th>

                                <th>Aksi</th>

                            </tr>
                        </thead>
           
                        <tbody>




                            <?php 
                        
                            $januari = DB::table('barang_masuks')->whereMonth('tanggal_masuk', '01')->get();
                            $februari = DB::table('barang_masuks')->whereMonth('tanggal_masuk', '02')->get();
                            $maret = DB::table('barang_masuks')->whereMonth('tanggal_masuk', '03')->get();
                            $april = DB::table('barang_masuks')->whereMonth('tanggal_masuk', '04')->get();
                            $mei = DB::table('barang_masuks')->whereMonth('tanggal_masuk', '05')->get();
                            $juni = DB::table('barang_masuks')->whereMonth('tanggal_masuk', '06')->get();
                            $juli =DB::table('barang_masuks')->whereMonth('tanggal_masuk', '07')->get();
                            $agustus =DB::table('barang_masuks')->whereMonth('tanggal_masuk', '08')->get();
                            $september =DB::table('barang_masuks')->whereMonth('tanggal_masuk', '09')->get();
                            $oktober =DB::table('barang_masuks')->whereMonth('tanggal_masuk', '10')->get();
                            $november =DB::table('barang_masuks')->whereMonth('tanggal_masuk', '11')->get();
                            $desember =DB::table('barang_masuks')->whereMonth('tanggal_masuk', '12')->get();
    
    
                            ?>


                       
                        @foreach ($barang_masuk as $item_masuk)

                    

                        
            <?php 
                            
            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_masuk->nama_barang)->sum('jumlah_stock');

            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_masuk->nama_barang)->sum('jumlah');

            $total_stock = (int)$barang_masuks - (int)$barang_keluars;

            $stock_masuk = (int) $barang_masuks;

            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_masuk->harga_satuan,2,',','.');

            $total_harga_masuk =  ($item_masuk->jumlah_stock)*($item_masuk->harga_satuan);

            $konversi_rupiah_total_masuk = 'Rp. ' . number_format($total_harga_masuk,2,',','.');




                  // $tanggal_masuk = $item_masuk->tanggal_masuk;

                  $tanggal_masuk = $item_masuk->tanggal_masuk;
                            
                            $bulan = array (
                                1 => 'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                            );

	                        $pecahkan = explode('-', $tanggal_masuk);

                            $masuk_asli = $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];

            ?>



                        <tr>
                            <td>{{$item_masuk->nama_barang}}</td>
                            <td>{{$item_masuk->nama_supplier}}</td>
                            <td><?php echo $masuk_asli; ?></td>
                            <td>{{$item_masuk->jumlah_stock}}</td>


                            
                            <td>{{$item_masuk->merk}}</td>
                            <td><?php echo $konversi_rupiah_satuan; ?></td>
                            <td>{{$item_masuk->size}}</td>
                            <td><?php echo   $konversi_rupiah_total_masuk ; ?></td>



                            
                            <td> 
                                <a href="{{route('barang_masuk.edit', $item_masuk->id)}}" class="btn btn-success">Edit</a>
                                <br><br>

                                @if (Auth::user()->is_superadmin==1)
                                <form action="{{route('barang_masuk.destroy', $item_masuk->id)}}" method = "POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class = "btn btn-danger" type = "submit">Hapus</button>
                                </form>
                                @endif
                             
                            </td>
                        </tr>
                   
                        @endforeach
                    

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->





    
@endsection





@push('script')








    
@endpush
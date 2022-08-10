@extends('template')


@section('title')
    Data Barang Keluar
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang Keluar</h1>
    
            {{-- <a href="laporan_barang_keluar/pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i
                class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Barang Keluar</a> --}}

                <form action="/laporan_barang_keluar/pdf" method = "GET">
                    <input type="hidden" name="tanggal_awal" value="<?php echo $_GET['tanggal_awal'] ?>">
                    <input type="hidden" name="tanggal_akhir" value="<?php echo $_GET['tanggal_akhir'] ?>">
    
                    <button type = "submit" class = "d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Barang Keluar</button>
                </form>


        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
            </div>
            <div class="card-body">
                
                <div class="form-group">
                    <form action="/laporan_barang_keluar/filtered_luaran" method = "GET">
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
                                <th>Tanggal Keluar</th>
                                <th>Jumlah</th>

                                <th>Nama Merk</th>
                                <th>Harga Satuan</th>
                                <th>Ukuran</th>
                                <th>Harga Total</th>

                                <th>Aksi</th>


                            </tr>
                        </thead>
             
                        <tbody>
                            
                                @foreach ($barang_keluar as $item_keluar)



                                <?php 
                            
                                $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_keluar->nama_barang)->sum('jumlah_stock');
                    
                                $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_keluar->nama_barang)->sum('jumlah');
                    
                                $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                    
                                $stock_keluar = (int) $barang_keluars;
                    
                                $konversi_rupiah_satuan = 'Rp. ' . number_format($item_keluar->harga_satuan,2,',','.');
                    
                                $total_harga_keluar =  ($item_keluar->jumlah)*($item_keluar->harga_satuan);
                    
                                $konversi_rupiah_total_keluar = 'Rp. ' . number_format($total_harga_keluar,2,',','.');
                    
                                ?>
                    

                                <tr>
                                    <td>{{$item_keluar->nama_barang}}</td>
                                    <td>{{$item_keluar->nama_supplier}}</td>
                                    <td>{{$item_keluar->tanggal_keluar}}</td>
                                    <td>{{$item_keluar->jumlah}}</td>



                                    <td>{{$item_keluar->merk}}</td>
                                    <td><?php echo $konversi_rupiah_satuan; ?></td>
                                    <td>{{$item_keluar->size}}</td>
                                    <td><?php echo $konversi_rupiah_total_keluar; ?></td>



                                    <td> 
                                        <a href="{{route('barang_keluar.edit', $item_keluar->id)}}" class="btn btn-success">Edit</a>
                                        <br><br>

                                        @if (Auth::user()->is_superadmin==1)
                                        <form action="{{route('barang_keluar.destroy', $item_keluar->id)}}" method = "POST">
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
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
    
    
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarangKeluar"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Barang Keluar</a>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Keluar</th>



                                <th>Merk</th>
                                <th>Harga Satuan</th>
                                <th>Ukuran</th>
                                <th>Harga Total</th>



                                <th>Jumlah</th>
                                <th>Aksi</th>


                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                        
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            <?php
                                $no = 1;
                                ?>
                                @foreach ($barang_keluar as $item_keluar)

                                <?php 
                                
                                      // $tanggal_masuk = $item_masuk->tanggal_masuk;

                            $tanggal_keluar = $item_keluar->tanggal_keluar;
                            
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

	                        $pecahkan = explode('-', $tanggal_keluar);

                            $keluar_asli = $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];


                                ?>



                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>{{$item_keluar->nama_barang}}</td>
                                    <td>{{$item_keluar->nama_supplier}}</td>
                                    <td><?php echo $keluar_asli; ?></td>





                                    <td>{{$item_keluar->merk}}</td>

                                    <td>
                                    
                                         <?php
                                            
                                            $satuan = 'Rp. ' . number_format($item_keluar->harga_satuan,2,',','.');
                                            echo $satuan;
                                            ?>
                                        {{-- {{$item_keluar->harga_satuan}} --}}
                                    
                                    </td>
                                    <td>{{$item_keluar->size}}</td>

                                    <td>
                                    <?php 

                                    $total = ($item_keluar->jumlah)*($item_keluar->harga_satuan); 
                                    $harga_barang_total = 'Rp. ' . number_format($total,2,',','.');
                                    
                                    echo $harga_barang_total;
                                    ?></td>

        






                                    <td>{{$item_keluar->jumlah}}</td>
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
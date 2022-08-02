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
    
    
            <a href="laporan_barang_keluar/pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i
                class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Barang Keluar</a>
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
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah</th>

                                <th>Nama Merk</th>
                                <th>Harga Satuan</th>
                                <th>Ukuran</th>
                                <th>Satuan</th>
                                <th>Harga Total</th>

                                <th>Aksi</th>


                            </tr>
                        </thead>
             
                        <tbody>
                            
                                @foreach ($barang_keluar as $item_keluar)
                                <tr>
                                    <td>{{$item_keluar->nama_barang}}</td>
                                    <td>{{$item_keluar->nama_supplier}}</td>
                                    <td>{{$item_keluar->tanggal_keluar}}</td>
                                    <td>{{$item_keluar->jumlah}}</td>



                                    <td>{{$item_keluar->merk}}</td>
                                    <td>{{$item_keluar->harga_satuan}}</td>
                                    <td>{{$item_keluar->size}}</td>
                                    <td>{{$item_keluar->satuan}}</td>
                                    <td><?php echo ($item_keluar->size)*($item_keluar->harga_satuan)  ?></td>



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
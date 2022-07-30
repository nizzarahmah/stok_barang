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
    
    
            <a href="/laporan_barang_masuk/pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i
                class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Barang Masuk</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Total Stock</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Total Stock</th>
                                <th>Aksi</th>

                            </tr>
                        </tfoot>
                        <tbody>
                       
                        @foreach ($barang_masuk as $item_masuk)
                        <tr>
                            <td>{{$item_masuk->nama_barang}}</td>
                            <td>{{$item_masuk->nama_supplier}}</td>
                            <td>{{$item_masuk->tanggal_masuk}}</td>
                            <td>{{$item_masuk->jumlah_stock}}</td>
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
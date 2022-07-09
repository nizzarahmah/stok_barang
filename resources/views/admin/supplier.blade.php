@extends('template')
@section('title')
    Data Supplier
@endsection

@section('content')







    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabel Data Supplier</h1>
    
    
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahSupplier"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Supplier</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Supplier</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                        
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($supplier as $item_supplier)
                            <tr>
                                <td>{{$item_supplier->id}}</td>
                                <td>{{$item_supplier->nama_supplier}}</td>
                                <td>{{$item_supplier->tanggal_masuk}}</td>
                                <td>{{$item_supplier->nama_barang}}</td>
                                <td>{{$item_supplier->jumlah}}</td>
                                <td>
                                    <a href="{{route('data_supplier.edit', $item_supplier->id)}}" class = "btn btn-success">Edit</a>
                                    <br><br>
                                    <button class = "btn btn-danger">Hapus</button>
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
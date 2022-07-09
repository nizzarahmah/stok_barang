@extends('template')


@section('title')
    Data Barang Keluar
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang Keluar</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

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


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah</th>
                        
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($barang_keluar as $item_keluar)
                            <tr>
                                <td>{{$item_keluar->nama_barang}}</td>
                                <td>{{$item_keluar->nama_supplier}}</td>
                                <td>{{$item_keluar->tanggal_keluar}}</td>
                                <td>{{$item_keluar->jumlah}}</td>
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
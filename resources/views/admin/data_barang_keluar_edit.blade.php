@extends('template')


@section('title')
    Data Barang Keluar {{$barang_keluar->nama_barang}}
@endsection

@section('content')

<?php 

$data_barang_keluar = DB::table('barang_keluars')->get();

$supplier = DB::table('suppliers')->get();

?>




    <!-- Begin Page Content -->
    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang Keluar {{$barang_keluar->nama_barang}}</h1>


        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarang"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Barang {{$barang_keluar->nama_barang}}</a>
    </div>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang Keluar {{$barang_keluar->nama_barang}}</h6>
            </div>
            <div class="card-body">
      
                <form action="{{route('barang_masuk.update', $barang_keluar->id)}}" method = "POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                      
                        {{-- <input type="text" name="nama_barang" id="nama_barang" value = "{{$barang_keluar->nama_barang}}" class = "form-control"> --}}
                    
                        <select name="nama_barang" id="nama_barang" class = "form-control">
                            @foreach ($data_barang_keluar as $item_keluar)                     
                                <option value="{{$item_keluar->nama_barang}}">{{$item_keluar->nama_barang}}</option>
                            @endforeach
                        </select>

                    </div>
{{-- 
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                            <input type="text" name="kode_barang" id="kode_barang" value = "{{$barang_keluar->kode_barang}}" class = "form-control">
                       
                    </div> --}}

                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                            {{-- <input type="text" name="nama_supplier" id="nama_supplier" value = "{{$barang_keluar->nama_supplier}}" class = "form-control"> --}}

                            <select name="nama_supplier" id="nama_supplier" class = "form-control">
                                <option value="{{$barang_keluar->nama_supplier}}" selected disabled>-- Silakan Pilih --</option>
                                @foreach ($supplier as $item_supplier)                     
                                    <option value="{{$item_supplier->nama_supplier}}">{{$item_supplier->nama_supplier}}</option>
                                @endforeach
                            </select>
    


                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value = "{{$barang_keluar->tanggal_masuk}}" class = "form-control">
                       
                    </div>



                    <div class="form-group">
                        <label for="jumlah_stock">Jumlah Stock</label>
                            <input type="number" name="jumlah_stock" id="jumlah_stock" value = "{{$barang_keluar->jumlah_stock}}" class = "form-control">
                       
                    </div>

                    <center>
                        <button type = "submit" class = "btn btn-primary">Submit Hasil Edit</button>
                    </center>
          


                </form>







            </div>
        </div>

    </div>
    <!-- /.container-fluid -->





    
@endsection
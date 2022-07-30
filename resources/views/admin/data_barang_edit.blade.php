@extends('template')


@section('title')
    Data Barang {{$data_barang->nama_barang}}
@endsection

@section('content')

<?php 

$supplier = DB::table('suppliers')->get();


?>





    <!-- Begin Page Content -->
    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang {{$data_barang->nama_barang}}</h1>


        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarang"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Barang {{$data_barang->nama_barang}}</a>
    </div>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang {{$data_barang->nama_barang}}</h6>
            </div>
            <div class="card-body">
      
                <form action="{{route('data_barang.update', $data_barang->id)}}" method = "POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" value = "{{$data_barang->nama_barang}}" class = "form-control">
                    </div>





                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                            {{-- <input type="text" name="kode_barang" id="kode_barang" value = "{{$data_barang->kode_barang}}" class = "form-control"> --}}


                            

                            <?php 
                
                            $kategoris = DB::table('kategoribarangs')->get();
                            
                            ?>
            
                            <select name="kode_barang" id="kode_barang" class = "form-control">
                                <option value="{{$data_barang->kode_barang}}" selected disabled>{{$data_barang->kode_barang}}</option>
                                @foreach ($kategoris as $items_kategori)
                                    <option value="{{$items_kategori->kode_kategori}}">{{$items_kategori->kode_kategori}}</option>
                                @endforeach
                            </select>
            
                       
                    </div>



                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>

                            {{-- <input type="text" name="nama_supplier" id="nama_supplier" value = "{{$data_barang->nama_supplier}}" class = "form-control"> --}}
                       
                            <select name="nama_supplier" id="nama_supplier" class = "form-control">
                                    <option value="" selected disabled>-- Silakan Pilih --</option>
                                @foreach ($supplier as $item_supplier)                     
                                    <option value="{{$item_supplier->nama_supplier}}">{{$item_supplier->nama_supplier}}</option>
                                @endforeach
                            </select>
    

                    </div>





                    


                    <div class="form-group">
                        <label for="total_stock">Total Stock</label>
                            <input type="number" name="total_stock" id="total_stock" value = "{{$data_barang->total_stock}}" class = "form-control">
                       
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
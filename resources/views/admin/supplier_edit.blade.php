@extends('template')


@section('title')
    Data Supplier {{$supplier->nama_supplier}}
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Supplier {{$supplier->nama_supplier}}</h1>


        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarang"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Supplier {{$supplier->nama_supplier}}</a>
    </div>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Supplier {{$supplier->nama_supplier}}</h6>
            </div>
            <div class="card-body">
      
                <form action="{{route('data_supplier.update', $supplier->id)}}" method = "POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" name="nama_supplier" id="nama_supplier" value = "{{$supplier->nama_supplier}}" class = "form-control">
                    </div>


                    <div class="form-group">
                        <label for="nama_supplier">Alamat Supplier</label>
                        <input type="text" name="alamat_supplier" id="nama_supplier" value = "{{$supplier->alamat_supplier}}" class = "form-control">
                    </div>

                    <div class="form-group">
                        <label for="contact">Kontak</label>
                        <input type="text" name="contact" id="contact" value = "{{$supplier->contact}}" class = "form-control">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value = "{{$supplier->tanggal_masuk}}" class = "form-control">
                       
                    </div>

                    {{-- <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                            <input type="text" name="nama_supplier" id="nama_supplier" value = "{{$supplier->nama_supplier}}" class = "form-control">
                       
                    </div> --}}



     

                    <center>
                        <button type = "submit" class = "btn btn-primary">Submit Hasil Edit</button>
                    </center>
          


                </form>







            </div>
        </div>

    </div>
    <!-- /.container-fluid -->





    
@endsection
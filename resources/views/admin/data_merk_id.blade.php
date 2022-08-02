@extends('template')


@section('title')
    Data Merk {{$merk->nama_merk}}
@endsection

@section('content')





    <!-- Begin Page Content -->
    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Merk {{$merk->nama_merk}}</h1>


        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahMerk"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Merk {{$merk->nama_merk}}</a>
    </div>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Merk {{$merk->nama_merk}}</h6>
            </div>
            <div class="card-body">
      
                <form action="{{route('data_merk.update', $merk->id)}}" method = "POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="nama_merk">Nama Merk</label>
                        <input type="text" name="nama_merk" id="nama_merk" value = "{{$merk->nama_merk}}" class = "form-control">
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
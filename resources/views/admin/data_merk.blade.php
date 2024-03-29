@extends('template')


@section('title')
    Data Merk
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Merk</h1>


        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahMerk"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Merk</a>
    </div>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Merk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Merk</th> 
                                <th>Aksi</th> 
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                               <th>Kode Barang</th>
                               <th>Nama Barang</th> 
                                <th>Nama Supplier</th>
                                <th>Total Stock</th>
                                <th>Aksi</th>
                        
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            <?php $no = 1; 
                            

                            
                            ?>

                            @foreach ($merk as $item_merk)

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>{{$item_merk->nama_merk}}</td>
   
                                <td>
                                     <a class = "btn btn-success" href = "{{route('data_merk.edit', $item_merk->id)}}">Edit</a>
                                <br> <br>
              
              
                                @if (Auth::user()->is_superadmin==1)
                                    <form action="{{route('data_merk.destroy', $item_merk->id)}}" method = "POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class = "btn btn-danger" type = "submit" >Hapus</button> 
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



@push('script')
    
<script>
    $(document).ready( function () {
$('#data_merk').DataTable();
} );
</script>


@endpush
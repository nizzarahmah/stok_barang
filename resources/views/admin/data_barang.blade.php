@extends('template')


@section('title')
    Data Barang
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang</h1>


        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarang"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Barang</a>
    </div>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th> 
                                 <th>Nama Supplier</th>
                                 <th>Total Stock</th>
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

                            @foreach ($data_barang as $item_barang)
                                
                            <?php 
                            
                            $barang_masuks = DB::table('barang_masuks')->where('barang_id', $item_barang->id)->sum('jumlah_stock');

                            $barang_keluars = DB::table('barang_keluars')->where('barang_id', $item_barang->id)->sum('jumlah');

                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                            

                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>{{$item_barang->nama_barang}}</td>
                                <td>{{$item_barang->kode_barang}}</td>
                                <td>{{$item_barang->nama_supplier}}</td>
                                <td><?php  echo $total_stock  ?></td>
                                <td>
                                     <a class = "btn btn-success" href = "{{route('data_barang.edit', $item_barang->id)}}">Edit</a>
                                <br> <br>
              
              
                                @if (Auth::user()->is_superadmin==1)
                                    <form action="{{route('data_barang.destroy', $item_barang->id)}}" method = "POST">
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
$('#data_barang').DataTable();
} );
</script>


@endpush
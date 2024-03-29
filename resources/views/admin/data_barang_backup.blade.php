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





                
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#menu1"><img src="http://www.downloadsbyvita.com/images/video.jpg"/></a></li>
                    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                  </ul>




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
                                <th>Nama Barang</th> 
                                <th>Kategori</th>
                                <th>Nama Merk</th>
                                <th>Ukuran</th>
                                <th>Harga Satuan</th>
                                <th>Total Stock</th>
                                <th>Harga Total</th>
                                 <th>Nama Supplier</th>
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
                            
                            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang->nama_barang)->sum('jumlah_stock');

                            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang->nama_barang)->sum('jumlah');

                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                            

                            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang->harga_satuan,2,',','.');

                            $total_harga =  ($total_stock)*($item_barang->harga_satuan);

                            $konversi_rupiah_total = 'Rp. ' . number_format($total_harga,2,',','.');

                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>{{$item_barang->nama_barang}}</td>
                                <td>{{$item_barang->nama_kategori}}</td>
                                <td>{{$item_barang->merk}}</td>
                                <td>{{$item_barang->size}}</td>
                                <td><?php echo  $konversi_rupiah_satuan ; ?></td>
                             
                                <td><?php  echo $total_stock  ?></td>
                                <td><?php echo $konversi_rupiah_total ?></td>
                                <td>{{$item_barang->nama_supplier}}</td>

                          
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
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





                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active border-white" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Kasur</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link border-white" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Jemuran</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link border-white" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Lemari</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link border-white" id="pills-rak-piring" data-toggle="pill" data-target="#pills-rakpiring" type="button" role="tab" aria-controls="pills-rakpiring" aria-selected="false">Rak Piring</button>
                      </li>

                      <li class="nav-item" role="presentation">
                        <button class="nav-link border-white" id="pills-barang-kecil" data-toggle="pill" data-target="#pills-barangkecil" type="button" role="tab" aria-controls="pills-barangkecil" aria-selected="false">Barang Kecil</button>
                      </li>


                      <li class="nav-item" role="presentation">
                        <button class="nav-link border-white" id="pills-lain-lain" data-toggle="pill" data-target="#pills-lain" type="button" role="tab" aria-controls="pills-lain" aria-selected="false">Lain - lain</button>
                      </li>



                  </ul>




                  <div class="tab-content" id="pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                
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
                            
                            $data_barang_jemuran_kasur = DB::table('data_barangs')->where('nama_kategori','Kasur')->get();

                            ?>

                            @foreach ($data_barang_jemuran_kasur as $item_barang_kasur)
                                
                            <?php 
                            
                            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang_kasur->nama_barang)->sum('jumlah_stock');

                            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang_kasur->nama_barang)->sum('jumlah');

                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                            

                            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang_kasur->harga_satuan,2,',','.');

                            $total_harga =  ($total_stock)*($item_barang_kasur->harga_satuan);

                            $konversi_rupiah_total = 'Rp. ' . number_format($total_harga,2,',','.');

                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>{{$item_barang_kasur->nama_barang}}</td>
                                <td>{{$item_barang_kasur->nama_kategori}}</td>
                                <td>{{$item_barang_kasur->merk}}</td>
                                <td>{{$item_barang_kasur->size}}</td>
                                <td><?php echo  $konversi_rupiah_satuan ; ?></td>
                             
                                <td><?php  echo $total_stock  ?></td>
                                <td><?php echo $konversi_rupiah_total ?></td>
                                <td>{{$item_barang_kasur->nama_supplier}}</td>

                          
                                <td>
                                     <a class = "btn btn-success" href = "{{route('data_barang.edit', $item_barang_kasur->id)}}">Edit</a>
                                <br> <br>
              
              
                                @if (Auth::user()->is_superadmin==1)
                                    <form action="{{route('data_barang.destroy', $item_barang_kasur->id)}}" method = "POST">
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







                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


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
                                            
                                            
                                            $data_barang_jemuran = DB::table('data_barangs')->where('nama_kategori','Jemuran')->get();

                                            ?>
                
                                            @foreach ($data_barang_jemuran as $item_barang_jemuran)
                                                
                                            <?php 
                                            
                                            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang_jemuran->nama_barang)->sum('jumlah_stock');
                
                                            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang_jemuran->nama_barang)->sum('jumlah');
                
                                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                                            
                
                                            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang_jemuran->harga_satuan,2,',','.');
                
                                            $total_harga =  ($total_stock)*($item_barang_jemuran->harga_satuan);
                
                                            $konversi_rupiah_total = 'Rp. ' . number_format($total_harga,2,',','.');
                
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>{{$item_barang_jemuran->nama_barang}}</td>
                                                <td>{{$item_barang_jemuran->nama_kategori}}</td>
                                                <td>{{$item_barang_jemuran->merk}}</td>
                                                <td>{{$item_barang_jemuran->size}}</td>
                                                <td><?php echo  $konversi_rupiah_satuan ; ?></td>
                                             
                                                <td><?php  echo $total_stock  ?></td>
                                                <td><?php echo $konversi_rupiah_total ?></td>
                                                <td>{{$item_barang_jemuran->nama_supplier}}</td>
                
                                          
                                                <td>
                                                     <a class = "btn btn-success" href = "{{route('data_barang.edit', $item_barang_jemuran->id)}}">Edit</a>
                                                <br> <br>
                              
                              
                                                @if (Auth::user()->is_superadmin==1)
                                                    <form action="{{route('data_barang.destroy', $item_barang_jemuran->id)}}" method = "POST">
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
                    



                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    
                    
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
                                            
                                            $data_barang_lemari = DB::table('data_barangs')->where('nama_kategori','Lemari')->get();
                                            
                                            ?>
                
                                            @foreach ($data_barang_lemari as $item_barang_lemari)
                                                
                                            <?php 
                                            
                                            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang_lemari->nama_barang)->sum('jumlah_stock');
                
                                            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang_lemari->nama_barang)->sum('jumlah');
                
                                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                                            
                
                                            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang_lemari->harga_satuan,2,',','.');
                
                                            $total_harga =  ($total_stock)*($item_barang_lemari->harga_satuan);
                
                                            $konversi_rupiah_total = 'Rp. ' . number_format($total_harga,2,',','.');
                
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>{{$item_barang_lemari->nama_barang}}</td>
                                                <td>{{$item_barang_lemari->nama_kategori}}</td>
                                                <td>{{$item_barang_lemari->merk}}</td>
                                                <td>{{$item_barang_lemari->size}}</td>
                                                <td><?php echo  $konversi_rupiah_satuan ; ?></td>
                                             
                                                <td><?php  echo $total_stock  ?></td>
                                                <td><?php echo $konversi_rupiah_total ?></td>
                                                <td>{{$item_barang_lemari->nama_supplier}}</td>
                
                                          
                                                <td>
                                                     <a class = "btn btn-success" href = "{{route('data_barang.edit', $item_barang_lemari->id)}}">Edit</a>
                                                <br> <br>
                              
                              
                                                @if (Auth::user()->is_superadmin==1)
                                                    <form action="{{route('data_barang.destroy', $item_barang_lemari->id)}}" method = "POST">
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










                    <div class="tab-pane fade" id="pills-rakpiring" role="tabpanel" aria-labelledby="pills-rakpiring">


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
                                            
                                            $data_barang_rakpiring = DB::table('data_barangs')->where('nama_kategori', 'Rak Piring')->get();
                                            ?>
                
                                            @foreach ($data_barang_rakpiring as $item_barang_rakpiring)
                                                
                                            <?php 
                                            
                                            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang_rakpiring->nama_barang)->sum('jumlah_stock');
                
                                            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang_rakpiring->nama_barang)->sum('jumlah');
                
                                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                                            
                
                                            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang_rakpiring->harga_satuan,2,',','.');
                
                                            $total_harga =  ($total_stock)*($item_barang_rakpiring->harga_satuan);
                
                                            $konversi_rupiah_total = 'Rp. ' . number_format($total_harga,2,',','.');
                
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>{{$item_barang_rakpiring->nama_barang}}</td>
                                                <td>{{$item_barang_rakpiring->nama_kategori}}</td>
                                                <td>{{$item_barang_rakpiring->merk}}</td>
                                                <td>{{$item_barang_rakpiring->size}}</td>
                                                <td><?php echo  $konversi_rupiah_satuan ; ?></td>
                                             
                                                <td><?php  echo $total_stock  ?></td>
                                                <td><?php echo $konversi_rupiah_total ?></td>
                                                <td>{{$item_barang_rakpiring->nama_supplier}}</td>
                
                                          
                                                <td>
                                                     <a class = "btn btn-success" href = "{{route('data_barang.edit', $item_barang_rakpiring->id)}}">Edit</a>
                                                <br> <br>
                              
                              
                                                @if (Auth::user()->is_superadmin==1)
                                                    <form action="{{route('data_barang.destroy', $item_barang_rakpiring->id)}}" method = "POST">
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







                    <div class="tab-pane fade" id="pills-barangkecil" role="tabpanel" aria-labelledby="pills-barangkecil">

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

                                            $data_barang_kecil = DB::table('data_barangs')->where('nama_kategori','Barang Kecil')->get();
                                            
                                            ?>
                
                                            @foreach ($data_barang_kecil as $item_barang_kecil)
                                                
                                            <?php 
                                            
                                            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang_kecil->nama_barang)->sum('jumlah_stock');
                
                                            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang_kecil->nama_barang)->sum('jumlah');
                
                                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                                            
                
                                            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang_kecil->harga_satuan,2,',','.');
                
                                            $total_harga =  ($total_stock)*($item_barang_kecil->harga_satuan);
                
                                            $konversi_rupiah_total = 'Rp. ' . number_format($total_harga,2,',','.');
                
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>{{$item_barang_kecil->nama_barang}}</td>
                                                <td>{{$item_barang_kecil->nama_kategori}}</td>
                                                <td>{{$item_barang_kecil->merk}}</td>
                                                <td>{{$item_barang_kecil->size}}</td>
                                                <td><?php echo  $konversi_rupiah_satuan ; ?></td>
                                             
                                                <td><?php  echo $total_stock  ?></td>
                                                <td><?php echo $konversi_rupiah_total ?></td>
                                                <td>{{$item_barang_kecil->nama_supplier}}</td>
                
                                          
                                                <td>
                                                     <a class = "btn btn-success" href = "{{route('data_barang.edit', $item_barang_kecil->id)}}">Edit</a>
                                                <br> <br>
                              
                              
                                                @if (Auth::user()->is_superadmin==1)
                                                    <form action="{{route('data_barang.destroy', $item_barang_kecil->id)}}" method = "POST">
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







                    <div class="tab-pane fade" id="pills-lain" role="tabpanel" aria-labelledby="pills-lain">
                       

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
                                            
                                            $data_barang_lain = DB::table('data_barangs')->where('nama_kategori','Lain-lain')->get();
                                            
                                            ?>
                
                                            @foreach ($data_barang_lain as $item_barang_lain)
                                                
                                            <?php 
                                            
                                            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang_lain->nama_barang)->sum('jumlah_stock');
                
                                            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang_lain->nama_barang)->sum('jumlah');
                
                                            $total_stock = (int)$barang_masuks - (int)$barang_keluars;
                                            
                
                                            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang_lain->harga_satuan,2,',','.');
                
                                            $total_harga =  ($total_stock)*($item_barang_lain->harga_satuan);
                
                                            $konversi_rupiah_total = 'Rp. ' . number_format($total_harga,2,',','.');
                
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>{{$item_barang_lain->nama_barang}}</td>
                                                <td>{{$item_barang_lain->nama_kategori}}</td>
                                                <td>{{$item_barang_lain->merk}}</td>
                                                <td>{{$item_barang_lain->size}}</td>
                                                <td><?php echo  $konversi_rupiah_satuan ; ?></td>
                                             
                                                <td><?php  echo $total_stock  ?></td>
                                                <td><?php echo $konversi_rupiah_total ?></td>
                                                <td>{{$item_barang_lain->nama_supplier}}</td>
                
                                          
                                                <td>
                                                     <a class = "btn btn-success" href = "{{route('data_barang.edit', $item_barang_lain->id)}}">Edit</a>
                                                <br> <br>
                              
                              
                                                @if (Auth::user()->is_superadmin==1)
                                                    <form action="{{route('data_barang.destroy', $item_barang_lain->id)}}" method = "POST">
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








                 



                </div>






    </div>
    <!-- /.container-fluid -->



    
@endsection



@push('script')
    
<script>
    $(document).ready( function () {
$('.table').DataTable();
} );
</script>


@endpush
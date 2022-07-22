<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title')
    </title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('bootstrap/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('bootstrap/css/sb-admin-2.min.css')}}" rel="stylesheet">

   <link rel="shortcut icon" href="{{url('/logo_sementara.png')}}" type="image/x-icon">

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>




   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

   
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   {{-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script> --}}


    @yield('style')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        {{-- <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar"> --}}
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Family Furniture<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id = "beranda">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}



                 <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item" id = "datamaster">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
                        aria-expanded="true" aria-controls="collapseDataMaster">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Data Master</span>
                    </a>
                    <div id="collapseDataMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                            <a class="collapse-item" href="{{url('/data_barang')}}">Data Barang</a>
                            <a class="collapse-item" href="{{url('/data_supplier')}}">Supplier</a>
                        </div>
                    </div>
                </li>



                
                 <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item" id = "transaksi">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi"
                        aria-expanded="true" aria-controls="collapseTransaksi">
                        <i class="fas fa-fw fa-th"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                            <a class="collapse-item" href="{{url('/barang_masuk')}}">Barang Masuk</a>
                            <a class="collapse-item" href="{{url('/barang_keluar')}}">Barang Keluar</a>
                        </div>
                    </div>
                </li>




                <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item" id = "laporan">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                        aria-expanded="true" aria-controls="collapseLaporan">
                        <i class="fas fa-fw fa-th"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseLaporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                            <a class="collapse-item" href="{{url('/laporan_stok_barang')}}">Laporan Stok Barang</a>
                            <a class="collapse-item" href="{{url('/laporan_barang_masuk')}}">Laporan Barang Masuk</a>
                            <a class="collapse-item" href="{{url('/laporan_barang_keluar')}}">Laporan Barang Keluar</a>
                            {{-- <a class="collapse-item" href="cards.html">Laporan Akhir</a> --}}
                        </div>
                    </div>
                </li>




                <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item" id = "kelola_pengguna">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                        aria-expanded="true" aria-controls="collapseUser">
                        <i class="fas fa-fw fa-user-circle"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                    <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                            <a class="collapse-item" href="{{url('/data_user')}}">Pengguna</a>
                            <a class="collapse-item" href="{{url('/kelompok_user')}}">Kelompok Pengguna</a>
                        </div>
                    </div>
                </li>



                            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span></a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

            </li>











            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-danger topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        {{-- <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li> --}}

                        {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                                <span class="mr-2 d-none d-lg-inline text-white-600 small">{{Auth::user()->name}}</span>
                                
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> --}}
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>




                    </ul>

                </nav>
                <!-- End of Topbar -->




                    @yield('content')





            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Nizza Rahmah Project 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="modaltambahBarangLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltambahBarangLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>










    <?php 
    
    $data_barangs = DB::table('data_barangs')->get();
    $data_suppliers = DB::table('suppliers')->get();

    
    ?>






    {{-- Modal Tambah Barang --}}

<!-- Modal -->

<form action="{{route('data_barang.store')}}" method = "POST">
@csrf

<div class="modal fade" id="modaltambahBarang" tabindex="-1" role="dialog" aria-labelledby="modaltambahBarangLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaltambahBarangLabel">Tambah Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       


            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input id = "nama_barang" type="text" class="form-control" name = "nama_barang" placeholder="Nama Barang">
            </div>


            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="number" class="form-control" name = "kode_barang" placeholder="Kode Barang">
            </div>


            
            <div class="form-group">
                <label for="nama_supplier">Nama Supplier</label>
                {{-- <input type="text" class="form-control" name = "nama_supplier" placeholder="Nama Supplier"> --}}
            
                <select name="nama_supplier" id="nama_supplier" class = "form-control">
                    @foreach ($data_suppliers as $supplier)
                    <option value="{{$supplier->nama_supplier}}">{{$supplier->nama_supplier}}</option>
                    @endforeach
            
                </select>
            
            </div>

            <div class="form-group">
                <label for="total_stock">Total Stock</label>
                <input type="number" class="form-control" name = "total_stock" placeholder="Total Stock">
            </div>







        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



</form>











{{-- Modal Tambah Supplier --}}

<!-- Modal -->

<form action="{{route('data_supplier.store')}}" method = "POST">
    @csrf
    
    <div class="modal fade" id="modaltambahSupplier" tabindex="-1" role="dialog" aria-labelledby="modaltambahSupplierLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modaltambahSupplierLabel">Tambah Data Supplier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
    
    
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input id = "nama_supplier" type="text" class="form-control" name = "nama_supplier" placeholder="Nama Supplier">
                </div>
    
    
                <div class="form-group">
                    <label for="alamat_supplier">Alamat Supplier</label>
                    <input type="text" class="form-control" name = "alamat_supplier" placeholder="Alamat Supplier">
                </div>
        
                
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" name = "tanggal_masuk" placeholder="Tanggal Masuk">
                </div>
    
                {{-- <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name = "jumlah" placeholder="Jumlah">
                </div> --}}
    
    
    
    
    
    
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    
    
    
    </form>







    


{{-- Modal Tambah Barang Masuk --}}

<!-- Modal -->

<form action="{{route('barang_masuk.store')}}" method = "POST">
    @csrf
    
    <div class="modal fade" id="modaltambahBarangMasuk" tabindex="-1" role="dialog" aria-labelledby="modaltambahBarangMasukLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modaltambahBarangMasukLabel">Tambah Data Barang Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
    
    
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    
                    <select name="nama_supplier" id="nama_supplier" class = "form-control">
                        @foreach ($data_suppliers as $supplier)
                        <option value="{{$supplier->nama_supplier}}">{{$supplier->nama_supplier}}</option>
                        @endforeach
                
                    </select>

                    {{-- <input id = "nama_supplier" type="text" class="form-control" name = "nama_supplier" placeholder="Nama Supplier"> --}}
                </div>
    
    
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>

                    <select name="nama_barang" id="nama_barang" class="form-control">
                    @foreach ($data_barangs as $barangs)
                    
                        <option value="{{$barangs->nama_barang}}">{{$barangs->nama_barang}}</option>
             
                      

                    @endforeach
                    </select>

                    {{-- <input type="text" class="form-control" name = "nama_barang" placeholder="Nama Barang"> --}}
                </div>
    
    
                
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" name = "tanggal_masuk" placeholder="Tanggal Masuk">
                </div>
    
                <div class="form-group">
                    <label for="jumlah_stock">Jumlah Stok</label>
                    <input type="number" class="form-control" name = "jumlah_stock" placeholder="Jumlah Stok">
                </div>
    
    
    
    
    
    
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    
    
    
    </form>




    




    

{{-- Modal Tambah Barang Masuk --}}

<!-- Modal -->

<form action="{{route('barang_keluar.store')}}" method = "POST">
    @csrf
    
    <div class="modal fade" id="modaltambahBarangKeluar" tabindex="-1" role="dialog" aria-labelledby="daltambahBarangKeluarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="daltambahBarangKeluarLabel">Tambah Data Barang Keluar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
    
    
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    {{-- <input id = "nama_supplier" type="text" class="form-control" name = "nama_supplier" placeholder="Nama Supplier"> --}}
                
                    <select name="nama_supplier" id="nama_supplier" class = "form-control">
                        @foreach ($data_suppliers as $supplier)
                        <option value="{{$supplier->nama_supplier}}">{{$supplier->nama_supplier}}</option>
                        @endforeach
                
                    </select>
                
                </div>
    
    
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    {{-- <input type="text" class="form-control" name = "nama_barang" placeholder="Nama Barang"> --}}
                    <select name="nama_barang" id="nama_barang" class="form-control">
                    @foreach ($data_barangs as $barangs)
              
                        <option value="{{$barangs->nama_barang}}">{{$barangs->nama_barang}}</option>
                   
                      

                    @endforeach

                </select>
                </div>
    
    
                
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" class="form-control" name = "tanggal_keluar" placeholder="Tanggal Keluar">
                </div>
    
                <div class="form-group">
                    <label for="jumlah">Jumlah Stok</label>
                    <input type="number" class="form-control" name = "jumlah" placeholder="Jumlah Stok">
                </div>
    
    
    
    
    
    
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    
    
    
    </form>







    <!-- Bootstrap core JavaScript-->



    @stack('script')




    <script src="{{asset('bootstrap/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('bootstrap/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('bootstrap/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('bootstrap/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('bootstrap/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('bootstrap/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
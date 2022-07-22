@extends('template')


@section('title')

Beranda
    
@endsection



@section('style')

<style>
    /* #beranda{
        background-color:'#fff';
        
    } */

    #beranda .nav-link {
        background-color:'#fff';
        color:'#f7f7f7';

    }


</style>

    
@endsection







@section('content')





        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Ambil Data</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Barang Masuk</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                            
                                            $barang = DB::table('data_barangs')->count();
                                            echo $barang . ' Buah';

                                            ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Barang Keluar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                            
                                        $barang_keluar = DB::table('barang_keluars')->count();
                                        echo $barang_keluar . ' Buah';

                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Supplier
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?php 
                                            
                                                $supplier = DB::table('suppliers')->count();
                                                echo $supplier ;
        
                                                ?>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Jumlah Kategori Barang</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                            
                                        $barang = DB::table('data_barangs')->count();
                                        echo $barang . ' Buah';

                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        

          
        </div>
        <!-- /.container-fluid -->







    
@endsection

                

        
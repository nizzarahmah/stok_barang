@extends('template')


@section('title')
    Kelompok User
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Superadmin</h1>


        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarang"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data User</a> --}}
    </div>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}




        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Status User</th> 
                                 <th>Email User</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>Nama User</th>
                                <th>Status User</th> 
                                 <th>Email User</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>

                            <?php 
                                
                            $superadmins = DB::table('users')->where('is_superadmin', 1)->get();
                            
                            ?>

                            @foreach ($superadmins as $item_superadmin)
                                
                            <tr>
                                <td>{{$item_superadmin->name}}</td>
                                <td>
                                    @if ($item_superadmin->is_admin == 1)
                                        Admin
                                    @elseif($item_superadmin->is_superadmin == 1)
                                        Superadmin
                                    @endif
                              
                                </td>

                                <td>{{$item_superadmin->email}}</td>
                                       
                            </tr>
                            @endforeach
                  

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->










    


    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabel Data Admin</h1>
    
    
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarang"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data User</a> --}}
        </div>
            {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    
    
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama User</th>
                                    <th>Status User</th> 
                                     <th>Email User</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama User</th>
                                    <th>Status User</th> 
                                     <th>Email User</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php 
                                
                                $admins = DB::table('users')->where('is_admin', 1)->get();
                                
                                ?>
    
                                @foreach ($admins as $item_admin)
                                    
                                <tr>
                                    <td>{{$item_admin->name}}</td>
                                    <td>
                                        @if ($item_admin->is_admin == 1)
                                            Admin
                                        @elseif($item_admin->is_superadmin == 1)
                                            Superadmin
                                        @endif
                                  
                                    </td>
    
                                    <td>{{$item_admin->email}}</td>
                                           
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
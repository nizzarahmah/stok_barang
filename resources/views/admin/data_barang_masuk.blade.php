@extends('template')


@section('title')
    Data Barang Masuk
@endsection

@section('content')






    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang Masuk</h1>
    
    
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle = "modal" data-target = "#modaltambahBarangMasuk"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Barang Masuk</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="barang_masuk" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>

                                <th>Merk</th>
                                <th>Harga Satuan</th>
                                <th>Ukuran</th>
                                <th>Harga Total</th>

                                <th>Total Stock</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Total Stock</th>
                                <th>Aksi</th>

                            </tr>
                        </tfoot> --}}
                        <tbody>
                       
                        @foreach ($barang_masuk as $item_masuk)
                        <tr>
                            <td>{{$item_masuk->nama_barang}}</td>
                            <td>{{$item_masuk->nama_supplier}}</td>
                            
                            <?php 

                            // $tanggal_masuk = $item_masuk->tanggal_masuk;

                            $tanggal_masuk = $item_masuk->tanggal_masuk;
                            
                            $bulan = array (
                                1 => 'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                            );

	                        $pecahkan = explode('-', $tanggal_masuk);

                            $masuk_asli = $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                            
                            ?>
                            
                            <td><?php echo $masuk_asli; ?></td>

                            <td>{{$item_masuk->merk}}</td>
                            
                            <td>
                                <?php
                                    $satuan = 'Rp. ' . number_format($item_masuk->harga_satuan,2,',','.');
                                    echo $satuan;
                               ?>
                               </td>
                            <td>{{$item_masuk->size}}</td>

                            <td><?php
                             $total = ($item_masuk->jumlah_stock)*($item_masuk->harga_satuan); 
                             $harga_barang_total = 'Rp. ' . number_format($total,2,',','.');
                             
                             echo $harga_barang_total;
                              ?></td>





                            <td>{{$item_masuk->jumlah_stock}}</td>
                            <td> 
                                <a href="{{route('barang_masuk.edit', $item_masuk->id)}}" class="btn btn-success">Edit</a>
                                <br><br>

                                @if (Auth::user()->is_superadmin==1)
                                <form action="{{route('barang_masuk.destroy', $item_masuk->id)}}" method = "POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class = "btn btn-danger" type = "submit">Hapus</button>
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








<script>

$(document).ready(function () { 





    $("#filter_1").DataTable({
		lengthMenu: [10, 50, 75, 100],
		order: [[5, "asc"]],
		rowGroup: {
			dataSrc: 5,
		},
		dom: "<'d-flex justify-content-between'lf>trB<'d-flex justify-content-between'ip>",
		buttons: [
			{ extend: "copy", className: "btn btn-primary" },
			{ extend: "csv", className: "btn btn-primary" },
			{ extend: "excel", className: "btn btn-primary" },
			{ extend: "pdf", className: "btn btn-primary" },
			{ extend: "print", className: "btn btn-primary" },
		],
		initComplete: function () {
			count = 0;
			this.api()
				.columns([0, 1, 2, 3, 4])
				.every(function () {
					var title = this.header();
					//replace spaces with dashes
					title = $(title).html().replace(/[\W]/g, "-");
					var column = this;
					var select = $(
						'<select style="width: 130px" id="' +
							title +
							'" class="select2" ></select>'
					)
						.appendTo($(column.header()))
						.on("change", function () {
							//Get the "text" property from each selected data
							//regex escape the value and store in array
							var data = $.map($(this).select2("data"), function (value, key) {
								return value.text
									? "^" + $.fn.dataTable.util.escapeRegex(value.text) + "$"
									: null;
							});

							//if no data selected use ""
							if (data.length === 0) {
								data = [""];
							}

							//join array into string with regex or (|)
							var val = data.join("|");

							//search for the option(s) selected
							column.search(val ? val : "", true, false).draw();
						});

					column
						.data()
						.unique()
						.sort()
						.each(function (d, j) {
							select.append("<option>" + d + "</option>");
						});

					//use column title as selector and placeholder
					$("#" + title).select2({
						multiple: true,
						closeOnSelect: false,
						placeholder: "Filter",
					});

					//initially clear select otherwise first option is selected
					$(".select2").val(null).trigger("change");
					$(".select2").click(function (e) {
						e.stopPropagation();
					});
				});
		},
	});





});


 
</script>

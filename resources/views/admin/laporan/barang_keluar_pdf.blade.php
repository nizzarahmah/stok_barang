<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang Keluar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Barang Keluar</h4>
	
	</center>
 






    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Barang</th> 
                 <th>Nama Supplier</th>
                 <th>Tanggal Keluar</th>
                 <th>Jumlah</th>


                 <th>Nama Merk</th>
                 <th>Harga Satuan</th>
                 <th>Ukuran</th>
                 {{-- <th>Satuan</th> --}}
                 <th>Harga Total</th>


            </tr>
        </thead>
        <tbody>

            <?php 
                $no = 1;

                ?>

            @foreach ($barang_keluar as $item_keluar)


            <?php 
                            
            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_keluar->nama_barang)->sum('jumlah_stock');

            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_keluar->nama_barang)->sum('jumlah');

            $total_stock = (int)$barang_masuks - (int)$barang_keluars;

            $stock_keluar = (int) $barang_keluars;

            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_keluar->harga_satuan,2,',','.');

            $total_harga_keluar =  ($item_keluar->jumlah)*($item_keluar->harga_satuan);

            $konversi_rupiah_total_keluar = 'Rp. ' . number_format($total_harga_keluar,2,',','.');

            
            $tanggal_keluar = $item_keluar->tanggal_keluar;
                            
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

	                        $pecahkan = explode('-', $tanggal_keluar);

                            $keluar_asli = $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];



            ?>

                
            <tr>
                <td><?php echo $no++; ?></td>
                <td>{{$item_keluar->nama_barang}}</td>
                <td>{{$item_keluar->nama_supplier}}</td> 
                <td><?php echo $keluar_asli; ?></td>
                <td>{{$item_keluar->jumlah}}</td>

                <td>{{$item_keluar->merk}}</td>
                <td><?php echo $konversi_rupiah_satuan ;?></td>
                <td>{{$item_keluar->size}}</td>
                {{-- <td>{{$item_keluar->satuan}}</td> --}}
                <td><?php echo $konversi_rupiah_total_keluar ;?></td>


            </tr>
            @endforeach
  

        </tbody>
    </table>







 
</body>
</html>











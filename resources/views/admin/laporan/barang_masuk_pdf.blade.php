<!DOCTYPE html>
<html>
<head>
	<title>Laporan Stok Barang</title>
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
		<h5>Laporan Barang Masuk</h4>
	
	</center>
 






    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Barang</th> 
                 <th>Nama Supplier</th>
                 <th>Tanggal Masuk</th>
                 <th>Total Stock</th>


                 <th>Nama Merk</th>
                 <th>Harga Satuan</th>
                 <th>Ukuran</th>
                 <th>Harga Total</th>


            </tr>
        </thead>
        <tbody>

            <?php 
                $no = 1;

                ?>

            @foreach ($barang_masuk as $item_barang)

            <?php 
                            
            $barang_masuks = DB::table('barang_masuks')->where('nama_barang', $item_barang->nama_barang)->sum('jumlah_stock');

            $barang_keluars = DB::table('barang_keluars')->where('nama_barang', $item_barang->nama_barang)->sum('jumlah');

            $total_stock = (int)$barang_masuks - (int)$barang_keluars;

            $stock_masuk = (int) $barang_masuks;

            $konversi_rupiah_satuan = 'Rp. ' . number_format($item_barang->harga_satuan,2,',','.');

            $total_harga_masuk =  ($stock_masuk)*($item_barang->harga_satuan);

            $konversi_rupiah_total_masuk = 'Rp. ' . number_format($total_harga_masuk,2,',','.');

            ?>
                
            <tr>
                <td><?php echo $no++; ?></td>
                <td>{{$item_barang->nama_barang}}</td>
                <td>{{$item_barang->nama_supplier}}</td> 
                <td>{{$item_barang->tanggal_masuk}}</td>
                <td>{{$item_barang->jumlah_stock}}</td>


                <td>{{$item_barang->merk}}</td>
                <td>{{$item_barang->harga_satuan}}</td>
                <td>{{$item_barang->size}}</td>
                <td><?php echo $konversi_rupiah_total_masuk ; ?></td>

                
            </tr>
            @endforeach
  

        </tbody>
    </table>







 
</body>
</html>











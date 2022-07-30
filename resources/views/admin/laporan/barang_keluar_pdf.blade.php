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


            </tr>
        </thead>
        <tbody>

            <?php 
                $no = 1;

                ?>

            @foreach ($barang_keluar as $item_barang)
                
            <tr>
                <td><?php echo $no++; ?></td>
                <td>{{$item_barang->nama_barang}}</td>
                <td>{{$item_barang->nama_supplier}}</td> 
                <td>{{$item_barang->tanggal_keluar}}</td>
                <td>{{$item_barang->jumlah}}</td>
            </tr>
            @endforeach
  

        </tbody>
    </table>







 
</body>
</html>











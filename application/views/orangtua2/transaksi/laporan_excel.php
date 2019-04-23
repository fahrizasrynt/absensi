<?php
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Data Transaksi.xls");
    header("Pragma: no-cache");
    header("Espires: 0")
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Laporan Transaksi</h1><br>
	<table border="1">
		<tr align="center" bgcolor="#000000" style="color: #FFF">
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Jenis Administrasi</th>
			<th>Jumlah bayar</th>
			<th>Tanggal</th>
		</tr>
			<?php
		        $query = $this->transaksi_model->view();
		        
		        foreach($query->result() as $row):
		    ?>
		<tr>
			<td align="center"><?php echo $row->nama_depan.' '.$row->nama_belakang ?></td>
			<td align="center"><?php echo $row->kelas ?></td>
			<td align="center"><?php echo $row->nama_administrasi ?></td>
			<td align="center"><?php echo $row->jumlah_bayar ?></td>
			<td align="center"><?php echo $row->tanggal ?></td>
		</tr>
			<?php
		    	endforeach;
		    ?>
	</table>
</body>
</html>
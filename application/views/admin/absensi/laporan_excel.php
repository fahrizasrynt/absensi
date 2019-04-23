<?php
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Data Absensi.xls");
    header("Pragma: no-cache");
    header("Espires: 0")
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Laporan Kasus</h1><br>
	<table border="1">
		<tr align="center" bgcolor="#000000" style="color: #FFF">
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Tanggal</th>
			<th>Keterangan</th>
		</tr>
			<?php		        
				$result = $this->session->userdata('result');
		        foreach($result as $row):
		    ?>
		<tr>
			<td align="center"><?php echo $row->nis ?></td>
			<td align="center"><?php echo $row->nama_depan.' '.$row->nama_belakang ?></td>
			<td align="center"><?php echo $row->tanggal ?></td>
			<td align="center"><?php echo $row->keterangan ?></td>
		</tr>
			<?php
		    	endforeach;
		    ?>
	</table>
</body>
</html>
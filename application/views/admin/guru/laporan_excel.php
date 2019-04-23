<?php
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Data Guru.xls");
    header("Pragma: no-cache");
    header("Espires: 0")
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Laporan Data guru</h1><br>
	<table border="1">
		<tr align="center" bgcolor="#000000" style="color: #FFF">
			<th>NIS</th>
			<th>Nama guru</th>
			<th>Kelas</th>
            <th>Agama</th>
			<th>No. Handphone</th>
			<th>Alamat</th>
			<th>Email</th>
		</tr>
			<?php
		        $query = $this->guru_model->view();
		        
		        foreach($query->result() as $row):
		    ?>
		<tr>
			<td align="center"><?php echo $row->nis ?></td>
			<td align="center"><?php echo $row->nama_depan.' '.$row->nama_belakang ?></td>
			<td align="center"><?php echo $row->kelas ?></td>
			<td align="center"><?php echo $row->agama ?></td>
			<td align="center"><?php echo $row->no_hp ?></td>
			<td align="center"><?php echo $row->alamat ?></td>
			<td align="center"><?php echo $row->email ?></td>
		</tr>
			<?php
		    	endforeach;
		    ?>
	</table>
</body>
</html>
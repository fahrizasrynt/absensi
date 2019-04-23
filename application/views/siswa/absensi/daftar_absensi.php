<?php
// Session 
if($this->session->flashdata('sukses')) { 
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
} 

// File upload error
if(isset($error)) {
  echo '<div class="alert alert-success">';
  echo $error;
  echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>
<!--  Modals-->
<div class="panel-body">

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($absensi as $siswa) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $siswa['nis']; ?></td>
        <td><?php echo $siswa['nama_depan'].' '.$siswa['nama_belakang']; ?></td>
        <td><?php echo $siswa['kelas'] ?></td>
        <td><?php echo $siswa['tanggal'] ?></td>
        <td><?php echo $siswa['keterangan'] ?></td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
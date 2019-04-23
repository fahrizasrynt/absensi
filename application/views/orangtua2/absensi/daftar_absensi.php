<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
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
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($siswa as $siswa) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $siswa['nis']; ?></td>
        <td><?php echo $siswa['nama_depan'].' '.$siswa['nama_belakang']; ?></td>
        <td><?php echo $siswa['kelas'] ?></td>
        <td><?php echo $siswa['keterangan'] ?></td>
        <td class="center">

      <form action="<?php echo base_url('orangtua/absensi');?>" method="post">
      <input type="hidden" name="id_siswa" value="<?php echo $siswa['id_siswa'];?>">
      <button class="btn btn-success" name="keterangan" value="sakit">S</button>
      <button  class="btn btn-primary" name="keterangan" value="izin">I</button>

      <button  class="btn btn-danger" name="keterangan" value="alfa">A</button>      

      </form>

       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
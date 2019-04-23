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



</p>
<form action="<?php echo base_url('guru/absensi');?>" method="post" id="tab-absen" name="absensi">
      <label>Masukan Tanggal Absensi</label>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>            
                  <input type="date" name="tanggal" class="form-control" value="<?php echo set_value('tanggal') ?>" >
                </div>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
  <input type="text" name="id_kelas" value="<?php echo $kelas?>">
	<?php $i=1; foreach($siswa as $siswa) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $siswa['nis']; ?>
          <input type="text" name="id_siswa[]" value="<?php echo $siswa['id_siswa']?>">
        </td>
        <td><?php echo $siswa['nama_depan'].' '.$siswa['nama_belakang']; ?></td>
        <td><?php echo count($siswa_sakit)?></td>
        <td class="center">
        <select name="keterangan[]" class="form-control">
          <option value="Hadir">Hadir</option>
          <option value="Sakit">Sakit</option>
          <option value="Alfa">Alfa</option>
          <option value="Izin">Izin</option>
          <option value="Dispensasi">Dispensasi</option>
      </select>  
        <!-- End Modals-->    
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
<p class="text-right">
<button class="btn btn-success btn-lg" type="submit">
  <i class="fa fa-save"></i> Simpan Absen
</button>
</p>
</form>
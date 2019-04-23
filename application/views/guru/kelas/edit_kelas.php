<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('guru/kelas/edit/'.$kelas['id_kelas']) ?>" method="post">
 
  <div class="form-group">
    <input type="text" name="kelas" class="form-control" placeholder="Kelas" required value="<?php echo $kelas['kelas'] ?>">
  </div>
  <div class="form-group">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan" required value="<?php echo $kelas['urutan'] ?>">
  </div>
  <div class="form-group input-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
</form>
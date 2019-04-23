<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('orangtua/kasus/edit/'.$kasus['id_kasus']) ?>" method="post">

      <div class="form-group">
          <label>Kelas</label>
          <select name="id_kelas" class="form-control">
              <?php foreach($kelas as $kelas) { ?>
              <option value="<?php echo $kelas['id_kelas'] ?>" <?php if($kelas['id_kelas']==$kasus['id_kelas']) { echo "selected"; } ?>>
                  <?php echo $kelas['kelas'] ?>
              </option>
              <?php } ?>
          </select>
      </div> 


      <div class="form-group">
          <label>Nama Siswa</label>
          <select name="id_siswa" class="form-control">
              <?php foreach($siswa as $siswa) { ?>
              <option value="<?php echo $siswa['id_siswa'] ?>" <?php if($kasus['id_siswa']==$siswa['id_siswa']) { echo "selected"; } ?>>
                  <?php echo $siswa['nama_depan'].' '.$siswa['nama_belakang'] ?>
              </option>
              <?php } ?>
          </select>
      </div> 

      <div class="form-group">
      <label>Nama Kasus</label>
        <input type="text" name="kasus" class="form-control" placeholder="Nama Kasus" required value="<?php echo $kasus['kasus'] ?>">
      </div>

      <div class="form-group">
      <label>Poin Kasus</label>
        <input type="number" name="poin" class="form-control" placeholder="Poin Kasus" required value="<?php echo $kasus['poin'] ?>">
      </div>      

  <div class="form-group input-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
</form>
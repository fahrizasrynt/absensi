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

<form action="<?php echo base_url('guru/absensi/edit/'.$siswa['id_absensi']) ?>" method="post">
 
  <div class="form-group">
  <label>Nama Siswa</label>
    <input type="text" name="nama_depan" class="form-control" placeholder="Kelas" required value="<?php echo $siswa['nama_depan'] ?>">
  </div>
  
  <div class="form-group">
      <label>Keterangan</label>
      <select name="keterangan" class="form-control">

        <option value="Hadir" 
        <?php if($siswa['keterangan']=="Hadir") { echo "selected"; } ?>
        >Hadir</option>}

        <option value="Sakit" 
        <?php if($siswa['keterangan']=="Sakit") { echo "selected"; } ?>
        >Sakit</option>}

        <option value="Alfa" 
        <?php if($siswa['keterangan']=="Alfa") { echo "selected"; } ?>
        >Alfa</option>}

        <option value="Izin" 
        <?php if($siswa['keterangan']=="Izin") { echo "selected"; } ?>
        >Izin</option>}  

        <option value="Dispensasi" 
        <?php if($siswa['keterangan']=="Dispensasi") { echo "selected"; } ?>
        >Dispensasi</option>}             

      </select>
    </div>

  <div class="form-group input-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
</form>
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

<form action="<?php echo base_url('guru/dashboard/umum') ?>" method="post">

<input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">

<div class="col-md-6">
	<h3>Konfigurasi Umum</h3><hr>
	    <div class="form-group">
		    <label>Nama Website</label>
		    <input type="text" name="nama_web" placeholder="Nama Website" value="<?php echo $site['nama_web'] ?>" required class="form-control">
	    </div>
	    <div class="form-group">
		    <label>Email Website</label>
		    <input type="text" name="email" placeholder="Email Website" value="<?php echo $site['email'] ?>" required class="form-control">
	    </div>	    
	</div>

	<div class="col-md-6">
	<h3>Keywords, Metatext & Maps</h3><hr>
	    <div class="form-group">
		    <label>Keywords</label>
		    <textarea class="form-control" name="keywords" placeholder="Kata kunci untuk pencarian google"><?php echo $site['keywords'];?></textarea>
	    </div>
	    <div class="form-group">
		    <label>Metatext</label>
		    <textarea class="form-control" name="metatext" placeholder="Meta text untuk pencarian google"><?php echo $site['metatext'];?></textarea>
	    </div>
	    <div class="form-group">
		    <label>Maps</label>
		    <textarea class="form-control" name="peta" placeholder="URL Frame Google Maps"><?php echo $site['peta'];?></textarea>
	    </div>	    	    
	</div>
	<div class="col-md-12">
		<input type="submit" name="submit" value="Update" class="btn btn-primary">
	</div>			
</form>
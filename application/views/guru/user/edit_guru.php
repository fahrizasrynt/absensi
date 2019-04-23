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

<form action="<?php echo base_url('guru/user/edit_guru/'.$guru['id_guru']) ?>" method="post">
 
  <div class="form-group input-group">
    <span class="input-group-addon">@</span>
    <input type="email" name="email" class="form-control" placeholder="Alamat email" required value="<?php echo $guru['email'] ?>">
  </div>
  <div class="form-group input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php echo $guru['username'] ?>" readonly disabled>
  </div>
  <div class="form-group input-group">
    <span class="input-group-addon"><i class="fa fa-key"></i></span>
    <input type="password" name="password" class="form-control" placeholder="Change Password">
  </div>
  <div class="form-group input-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
</form>
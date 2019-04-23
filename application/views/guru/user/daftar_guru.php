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

<!--  Modals-->
<div class="panel-body">


<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Guru Baru</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('guru/user/guru') ?>" method="post">
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php echo set_value('username') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon">@</span>              
              <input type="email" name="email" class="form-control" placeholder="Alamat Email" required value="<?php echo set_value('email') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" required value="<?php echo set_value('password') ?>">
          	</div>
            <div class="form-group input-group">
            	<input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-md">
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
</div>
<!-- End Modals-->

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($guru as $guru) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $guru['username']; ?></td>
        <td><?php echo $guru['email'] ?></td>
        <td class="center"><?php echo $guru['username'];?></td>
        
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
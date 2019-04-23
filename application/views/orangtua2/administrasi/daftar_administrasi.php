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
          <h4 class="modal-title" id="myModalLabel">Tambah Administrasi Baru</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('orangtua/administrasi') ?>" method="post">
            <div class="form-group">
            <div class="form-group">
                <label>Kelas</label>
                <select name="id_kelas" class="form-control">
                    <?php foreach($kelas as $kelas) { ?>
                    <option value="<?php echo $kelas['id_kelas'] ?>">
                        <?php echo $kelas['kelas'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>             
              <input type="text" name="nama_administrasi" class="form-control" placeholder="Nama Administrasi" required value="<?php echo set_value('nama_administrasi') ?>">
          	</div>
            <div class="form-group">
              <input type="number" name="jumlah_harga" class="form-control" placeholder="Jumlah Harga Kelas" required value="<?php echo set_value('jumlah_harga') ?>">
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
        <th>Kelas</th>
        <th>Nama Administrasi</th>
        <th>Jumlah Harga</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($admin as $admin) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $admin['kelas']; ?></td>
        <td><?php echo $admin['nama_administrasi'] ?></td>
        <td><?php echo $admin['jumlah_harga'] ?></td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
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
          <h4 class="modal-title" id="myModalLabel">Tambah Kelas Baru</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('guru/kelas') ?>" method="post">
            <div class="form-group">
              <input type="text" name="kelas" class="form-control" placeholder="Kelas" required value="<?php echo set_value('kelas') ?>">
          	</div>
            <div class="form-group">
              <input type="number" name="urutan" class="form-control" placeholder="Urutan Kelas" required value="<?php echo set_value('urutan') ?>">
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
        <th>No</th>
        <th>Kelas</th>
        <th>Urutan</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($kelas as $kelas) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><a href="<?php echo base_url()?>guru/absensi/absensiswa/<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['kelas']; ?></td>
        <td><?php echo $kelas['urutan'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('guru/kelas/edit/'.$kelas['id_kelas']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

        <a href="<?php echo base_url('guru/kelas/delete/'.$kelas['id_kelas']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus kelas ini?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
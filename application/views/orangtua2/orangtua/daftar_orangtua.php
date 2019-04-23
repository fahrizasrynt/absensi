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
<p>
<a class="btn btn-danger" href="<?php echo base_url('orangtua/list_orangtua/cetak_pdf');?>" target="_blank">
  <i class="fa fa-print"></i> PDF</a>

<a class="btn btn-success" href="<?php echo base_url('orangtua/list_orangtua/cetak_excel');?>"><i class="fa fa-print"></i> Excel</a></p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama Guru</th>
        <th>Pendidikan</th>
        <th>Jabatan</th>
        <th>Handphone</th>
        <th>Agama</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($orangtua as $orangtua) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $orangtua['nama_depan'].' '.$orangtua['nama_belakang']; ?></td>
        <td><?php echo $orangtua['pendidikan'] ?></td>
        <td><?php echo $orangtua['jabatan'] ?></td>
        <td><?php echo $orangtua['no_hp'] ?></td>
        <td><?php echo $orangtua['agama'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('orangtua/list_orangtua/edit/'.$orangtua['id_orangtua']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

        <a href="<?php echo base_url('orangtua/list_orangtua/delete/'.$orangtua['id_orangtua']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus guru ini?')"><i class="fa fa-trash"></i></a>
       
        <button class="btn btn-success" data-toggle="modal" data-target="#View<?php echo $orangtua['id_orangtua']; ?>"><i class="fa fa-eye"></i></button>

       <!--  Modals-->
        <div class="modal fade" id="View<?php echo $orangtua['id_orangtua']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Detail Guru</h4>
              </div>
              <div class="modal-body">
              <div class="col-md-12">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
          <tr>
          <img src="<?php echo base_url('assets/upload/image/'.$orangtua['foto']);?>" width="539px">
            <td>Nama Siswa</td>
            <td><?php echo $orangtua['nama_depan'] ?></td>
          </tr>                      
          <tr>
            <td>Alamat</td>
            <td><?php echo $orangtua['alamat']; ?></td>
          </tr>                   
          <tr>
            <td>&nbsp;</td>
            <td>

            <a href="<?php echo base_url('orangtua/list_orangtua/edit/'.$orangtua['id_orangtua']) ?>" class="btn btn-primary">Edit</a>

            <a href="<?php echo base_url('orangtua/list_orangtua/delete/'.$orangtua['id_orangtua']) ?>" class="btn btn-danger">Hapus</a>
          </tr>
        </table>
        </div>
        <div class="clearfix"></div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
          </div>
        </div>
        </div>
        <!-- End Modals-->    
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
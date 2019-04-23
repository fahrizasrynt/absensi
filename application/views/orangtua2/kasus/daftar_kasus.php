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

<!--  Modals-->
<div class="panel-body">
<p><button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Kasus</button>

<a class="btn btn-danger" href="<?php echo base_url('orangtua/kasus/cetak_pdf');?>" target="_blank">
  <i class="fa fa-print"></i> PDF</a>

<a class="btn btn-success" href="<?php echo base_url('orangtua/kasus/cetak_excel');?>"><i class="fa fa-print"></i> Excel</a></p>

</p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Kasus Baru</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('orangtua/kasus') ?>" method="post">
            <div class="form-group">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control" id="kelas">
                <option value="">Pilih Kelas</option>
                <?php foreach($kelas as $kelas) { ?>
                <option value="<?php echo $kelas['id_kelas'] ?>" 
                <?php if(isset($_POST['id_kelas']) && $_POST['id_kelas']==$kelas['id_kelas']) { echo "selected"; } ?>
                ><?php echo $kelas['kelas'] ?></option>
                <?php } ?>
            </select>          
            </div>
          <div class="form-group">
              <label>Nama Siswa</label>
              <select name="id_siswa" class="form-control" id="siswa">
                <option value="">Nama Siswa</option>
                <?php foreach($siswa as $siswa) { ?>
                <option value="<?php echo $siswa['id_siswa'] ?>" class="<?php echo $siswa['id_kelas'] ?>" 
                <?php if(isset($_POST['id_kelas']) && $_POST['id_kelas']==$siswa['id_kelas']) { echo "selected"; } ?>
                ><?php echo $siswa['nama_depan'] ?></option>
                <?php } ?>
            </select>

          <script>
          $("#siswa").chained("#kelas");
          </script>

          </div>
            <div class="form-group">
            <label>Nama Kasus</label>
              <input type="text" name="kasus" class="form-control" placeholder="Nama Kasus" required value="<?php echo set_value('kasus') ?>">
            </div>
            <div class="form-group">
            <label>Poin</label>
              <input type="number" name="poin" class="form-control" placeholder="Poin Kasus" required value="<?php echo set_value('poin') ?>">
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
        <th>Nama Siswa</th>
        <th>Nama Kasus</th>
        <th>Poin</th>
        <th>Tanggal</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
  <?php $i=1; foreach($kasus as $kasus) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td>    
            <?php echo $kasus['nama_depan'].' '.$kasus['nama_belakang']; ?>
            <br>
            <small><strong>Kelas</strong> : <?php echo $kasus['kelas'];?></small>
        </td>
        <td><?php echo $kasus['kasus'] ?></td>
        <td><p style="color:orange; font-weight:bold;"><?php echo $kasus['poin'] ?></p></td>
        <td><?php echo date('l, d/m/Y', strtotime($kasus['tanggal'])); ?></td>
        <td class="center">
        <a href="<?php echo base_url('orangtua/kasus/edit/'.$kasus['id_kasus']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

        <a href="<?php echo base_url('orangtua/kasus/delete/'.$kasus['id_kasus']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus kasus ini?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>

<script>
$("#id_kab").chained("#id_prov");
$("#id_kec").chained("#id_kab");
</script>
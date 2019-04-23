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
<p><button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Transaksi</button>

<a class="btn btn-danger" href="<?php echo base_url('admin/transaksi/cetak_pdf');?>" target="_blank">
  <i class="fa fa-print"></i> PDF</a>

<a class="btn btn-success" href="<?php echo base_url('admin/transaksi/cetak_excel');?>"><i class="fa fa-print"></i> Excel</a></p>



<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Transaksi Baru</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/transaksi') ?>" method="post">

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
            <label>Administrasi</label>
            <select name="id_administrasi" class="form-control" id="administrasi">
                <option value="">Pilih Administrasi</option>
                <?php foreach($administrasi as $administrasi) { ?>
                <option value="<?php echo $administrasi['id_administrasi'] ?>" class="<?php echo $administrasi['id_administrasi'] ?>" 
                <?php if(isset($_POST['id_administrasi']) && $_POST['id_administrasi']==$administrasi['id_administrasi']) { echo "selected"; } ?>
                ><?php echo $administrasi['nama_administrasi'].' - Rp.'.$administrasi['jumlah_harga'] ?></option>
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
                ><?php echo $siswa['nama_depan'].' '.$siswa['nama_belakang'] ?></option>
                <?php } ?>
            </select>
          </div> 

          <script>
          $("#administrasi").chained("#kelas");
          $("#siswa").chained("#administrasi");
          </script>

          <div class="form-group">
              <label>Jumlah Bayar</label>
              <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar" required value="<?php echo set_value('jumlah_bayar') ?>">
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
        <th>Jenis Administrasi</th>
        <th>Pembayaran</th>
        <th>Sisa - Status</th>        
        <th>Tanggal Pembayaran</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
  <?php 
    $i=1; foreach($transaksi as $transaksi) {
      $bayar = $transaksi['jumlah_bayar'];
      $administrasi = $transaksi['jumlah_harga'];
   ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td>
          <?php echo $transaksi['nama_depan'].' '.$transaksi['nama_belakang']; ?>
        <br>
          <small>Kelas : <?php echo $transaksi['kelas'];?></small>  
        </td>
        <td>
        <strong>
          <?php echo $transaksi['nama_administrasi'] ?>
        </strong>
        <br>
        <small>
          Total : Rp. <?php echo $transaksi['jumlah_harga'];?> 
        </small>
        </td>
        <td>Rp. <?php echo $transaksi['jumlah_bayar'] ?></td>
        <td>
          Rp. <?php echo $administrasi - $bayar;  ?>
          <br>
          Status :
          <?php 
            if ($bayar >= $administrasi){ ?> 
              <span class="label label-success">Lunas</span>
            <?php 
              }else{ 
            ?>
              <span class="label label-danger">Belum Lunas</span>
            <?php 
              }
            ?>          
        </td>        
        <td><?php echo date('l, d/m/Y', strtotime($transaksi['tanggal'])); ?></td>

        <td class="center">
        <a href="<?php echo base_url('admin/transaksi/edit/'.$transaksi['id_transaksi']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

        <a href="<?php echo base_url('admin/transaksi/delete/'.$transaksi['id_transaksi']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus transaksi ini?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>

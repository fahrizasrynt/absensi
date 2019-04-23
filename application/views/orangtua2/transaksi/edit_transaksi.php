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

<form action="<?php echo base_url('orangtua/transaksi/edit/'.$transaksi['id_transaksi']) ?>" method="post">
 
      <div class="form-group">
          <label>Nama Siswa</label>
          <select name="id_siswa" class="form-control">
              <?php foreach($siswa as $siswa) { ?>
              <option value="<?php echo $siswa['id_siswa'] ?>" <?php if($transaksi['id_siswa']==$siswa['id_siswa']) { echo "selected"; } ?>>
                  <?php echo $siswa['nama_depan'].' '.$siswa['nama_belakang'] ?>
              </option>
              <?php } ?>
          </select>
      </div>

      <div class="form-group">
          <label>Jenis Administrasi</label>
          <select name="id_administrasi" class="form-control">
              <?php foreach($administrasi as $administrasi) { ?>
              <option value="<?php echo $administrasi['id_administrasi'] ?>" <?php if($administrasi['id_administrasi']==$transaksi['id_administrasi']) { echo "selected"; } ?>>
                  <?php echo $administrasi['nama_administrasi'] ?>
              </option>
              <?php } ?>
          </select>
      </div>

  <div class="form-group">
  <?php
      $bayar = $transaksi['jumlah_bayar'];
      $administrasi = $transaksi['jumlah_harga'];
  ?>   
  <label>Sisa Pembayaran - <small><?php echo $administrasi - $bayar;  ?></small></label> 
    <input type="text" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar" required>
  </div>
  <div class="form-group">
  <label>Tanggal Pembayaran</label>
    <input type="text" name="tanggal" class="form-control" placeholder="Tanggal Pembayaran" value="<?php echo $transaksi['tanggal'];?>">
  </div>
  <div class="form-group input-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
</form>
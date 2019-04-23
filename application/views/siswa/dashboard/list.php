<center>SELAMAT DATANG DI HALAMAN ABSENSI SISWA
<h1>
<?php
$id_siswa       = $this->session->userdata('id');
$name_session   = $this->siswa_model->detail($id_siswa);
?>
&nbsp;
<?php echo $name_session['nama_depan'].' '.$name_session['nama_belakang'] ?></h1></center>
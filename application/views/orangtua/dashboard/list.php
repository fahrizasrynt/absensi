<center>SELAMAT DATANG DI HALAMAN ABSENSI
<h1>
<?php
$id_orangtua       = $this->session->userdata('id');
$name_session   = $this->orangtua_model->detail($id_orangtua);
?>
&nbsp;
<?php echo $name_session['nama_depan'].' '.$name_session['nama_belakang'] ?></h1></center>
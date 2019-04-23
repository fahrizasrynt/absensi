<?php
    $site = $this->konfigurasi_model->listing();
    $this->siswa_login->cek_login();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title;?></title>
    <!-- Pemangillan Icon Gambar -->
    <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="shortcut icon">
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>assets/guru/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>assets/guru/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url();?>assets/guru/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/guru/assets/css/custom.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/guru/assets/css/datepicker.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <!-- Data Tables -->
    <link href="<?php echo base_url() ?>assets/guru/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
    <script src="<?php echo base_url() ?>assets/guru/assets/js/jquery-1.10.2.js"></script>   
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!-- Jquery chaine -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="<?php echo base_url('assets/guru/assets/js/jquery.chained.js') ?>" type="text/javascript" charset="utf-8" async defer></script>


</head>
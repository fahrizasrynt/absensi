<?php
// Load konfigurasi
$site = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $title.' - '.$site['nama_web'] ?></title>
<link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="shortcut icon">
<!-- BOOTSTRAP STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<!-- CUSTOM STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<!-- TABLE STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
<div class="container">
<div class="row text-center ">
<div class="col-md-12">
    <h2><img src="<?php echo base_url('assets/upload/image/'.$site['logo']);?>" width="150px"></h2>
</div>
</div>
<div class="row ">
<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
<div class="panel panel-default">
<div class="panel-heading" align="center">
<strong>Login Sebagai Orangtua</strong>  
</div>
<div class="panel-body">

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

<form role="form" action="<?php echo base_url('orangtua/login') ?>" method="post">
   <br />
 <div class="form-group input-group">
        <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
        <input type="text" name="username" class="form-control" placeholder="Username " />
    </div>
     <div class="form-group input-group">
        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
        <input type="password" name="password" class="form-control"  placeholder="Password" />
    	</div>
<div class="form-group">
        <label class="checkbox-inline">
            <input type="checkbox" /> Remember me
        </label>
       
    </div>
 
 	<input type="submit" name="submit" value="Login Now" class="btn btn-primary"> 
    <input type="reset" name="reset" value="Reset" class="btn btn-default"> 
</form>
</div>
</div>
</div>
</div>
</div>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>

</body>
</html>

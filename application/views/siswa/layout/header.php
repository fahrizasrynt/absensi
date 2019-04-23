<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('guru/dashboard') ?>">
            
            <?php echo $site['nama_web'] ?></a> 
        </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
color : yellow;
font-size: 16px;"> 

<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date('d M Y');
echo $tgl_sekarang;


$id_siswa       = $this->session->userdata('id');
$name_session   = $this->siswa_model->detail($id_siswa);
?>
&nbsp;
<a href="#" class="btn btn-danger square-btn-adjust"><i class="fa fa-user"></i>&nbsp; <?php echo $name_session['nama_depan'].' '.$name_session['nama_belakang'] ?></a>
<a href="<?php echo base_url('siswa/login/logout');?>" class="btn btn-danger square-btn-adjust"><i class="fa fa-power-off"></i>&nbsp; Logout</a> 
 </div>
        </nav>
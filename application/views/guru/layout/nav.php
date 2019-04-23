<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">								
               
                   <!-- Absensi -->                  
                <li><a href="#"><i class="fa fa-check"></i> Absensi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('guru/absensi') ?>">Daftar Absensi</a></li>
                            
                            <li><a href="<?php echo base_url('guru/absensi/laporan') ?>">Laporan Absensi</a></li>
                        </ul>
                </li>  

                    <!-- Kelas -->                  
                <li><a href="#"><i class="fa fa-list"></i> Kelas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('guru/kelas') ?>">Daftar Kelas</a></li>
                        </ul>
                </li>
              
                                    <!-- User -->                  
                <li><a href="#"><i class="fa fa-user"></i> User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('guru/user/guru') ?>">Daftar Guru</a></li>
                            <li><a href="<?php echo base_url('guru/siswa') ?>">Daftar Siswa</a></li>
                            <li><a href="<?php echo base_url('guru/orangtua') ?>">Daftar Orangtua</a></li>                            
                        </ul>
                </li>




                </ul>               
            </div>
</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">


<div class="row">
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
             <h2><?php echo $title ?></h2>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
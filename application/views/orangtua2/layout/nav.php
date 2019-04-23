<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">								
                    <!-- User -->                  
                <li><a href="#"><i class="fa fa-user"></i> User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('orangtua/siswa') ?>">Daftar Siswa</a></li>
                            <li><a href="<?php echo base_url('orangtua/list_orangtua') ?>">Daftar orangtua</a></li>                            
                        </ul>
                </li>


                <?php if($this->session->userdata('level') == 'tu') { ?>

                    <!-- Administrasi -->                  
                <li><a href="#"><i class="fa fa-check-square"></i> Administrasi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('orangtua/administrasi') ?>">Daftar Administrasi</a></li>
                        </ul>
                </li> 

                    <!-- Transaksi -->                  
                <li><a href="#"><i class="fa fa-dollar"></i> Transaksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('orangtua/transaksi') ?>">Daftar Transaksi</a></li>
                        </ul>
                </li>  
                <?php 
                    }elseif($this->session->userdata('level') == 'wali_kelas') {
                ?>


                    <!-- Absensi -->                  
                <li><a href="#"><i class="fa fa-check"></i> Absensi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('orangtua/absensi') ?>">Daftar Absensi</a></li>
                        </ul>
                </li>                

                <?php } ?>



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
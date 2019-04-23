<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('admin/dashboard') ?>">
            
            ABSENSI SISWA</a> 
        </div>
  <div style="color: yellow;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 
<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
    echo "Minggu";
}elseif ($hari=="Monday") {
    echo "Senin";
}elseif ($hari=="Tuesday") {
    echo "Selasa";
}elseif ($hari=="Wednesday") {
    echo "Rabu";
}elseif ($hari=="Thursday") {
    echo("Kamis");
}elseif ($hari=="Friday") {
    echo "Jum'at";
}elseif ($hari=="Saturday") {
    echo "Sabtu";
}
?>,
<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date('d M Y');
echo $tgl_sekarang;
$id_guru       = $this->session->userdata('id');
$name_session   = $this->guru_model->detail($id_guru);
?>
<a style="color: yellow"> ||</a>
<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat object date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">                             
<span id="clock"></span> 
&nbsp;
<a href="#" class="btn btn-danger square-btn-adjust"><i class="fa fa-user"></i>&nbsp; <?php echo $name_session['username'] ?></a>
<a href="<?php echo base_url('admin/login/logout');?>" class="btn btn-primary square-btn-adjust">Logout</a> </div>
        </nav>
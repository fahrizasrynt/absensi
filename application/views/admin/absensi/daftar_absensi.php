<?php
// Session 
if($this->session->flashdata('sukses')) { 
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
} 

// File upload error
if(isset($error)) {
  echo '<div class="alert alert-success">';
  echo $error;
  echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>
<!--  Modals-->
<div class="panel-body">
<p><a class="btn btn-primary" href="<?php echo base_url('guru/absensi/absen');?>"><i class="fa fa-plus"></i> Tambah Absen</button>
<a class="btn btn-success" href="<?php echo base_url('guru/absensi/laporan');?>"><i class="fa fa-plus"></i> Tambah Laporan</a>
</p>

</p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 980px;">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Detail Siswa</h4>
              </div>
              <div class="modal-body">
              <div class="col-md-12">

      <form action="<?php echo base_url('guru/absensi');?>" method="post" id="tab-absen">
      <label>Masukan Tanggal Absensi</label>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>            
                  <input type="date" name="tanggal" class="form-control" value="<?php echo set_value('tanggal') ?>" >
                </div>
      <label>Pilih Data Kelas :</label>
      <select name="keterangan_<?php echo $kelas['id_kelas']; ?>" class="form-control">
          <option value="Hadir">Hadir</option>
          <option value="Sakit">Sakit</option>
          <option value="Alfa">Alfa</option>
          <option value="Izin">Izin</option>
          <option value="Dispensasi">Dispensasi</option>
      </select>  
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
  <?php $i=1; foreach($siswa as $siswa) { 

    ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $siswa['nis']; ?></td>
        <td><?php echo $siswa['nama_depan'].' '.$siswa['nama_belakang']; ?></td>
        <td><?php echo $siswa['kelas'] ?></td>
        <td class="center">

      <select name="keterangan_<?php echo $siswa['id_siswa']; ?>" class="form-control">
          <option value="Hadir">Hadir</option>
          <option value="Sakit">Sakit</option>
          <option value="Alfa">Alfa</option>
          <option value="Izin">Izin</option>
          <option value="Dispensasi">Dispensasi</option>
      </select>    
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>

<p class="text-right">
<button class="btn btn-success btn-lg" type="submit">
  <i class="fa fa-save"></i> Simpan Absen
</button>
</p>
  </form>
        </div>
        <div class="clearfix"></div>
              </div>
              
              <div class="modal-footer">
                 
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
          </div>
        </div>
        </div>
        <!-- End Modals-->    

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Siswa Hadir</th>
        <th>Siswa Sakit</th>
        <th>Siswa Alfa</th>
        <th>Siswa Izin</th>
        <th>Siswa Dispensasi</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
  <?php $i=1; foreach($pertanggal as $absen) {
    $pertanggal = $absen['tanggal'];
    $siswa_hadir = $this->absensi_model->siswa_hadir($pertanggal);
    $siswa_sakit = $this->absensi_model->siswa_sakit($pertanggal);
    $siswa_alfa = $this->absensi_model->siswa_alfa($pertanggal);
    $siswa_izin = $this->absensi_model->siswa_izin($pertanggal);
    $siswa_dispensasi = $this->absensi_model->siswa_dispensasi($pertanggal);
   ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $absen['tanggal']; ?></td>
        <td><?php echo count($siswa_hadir)?></td>
        <td><?php echo count($siswa_sakit)?></td>
        <td><?php echo count($siswa_alfa)?></td>
        <td><?php echo count($siswa_izin)?></td>
        <td><?php echo count($siswa_dispensasi)?></td>
        <td class="center">
        <a href="<?php echo base_url('guru/absensi/view/'.$absen['tanggal']) ?>" class="btn btn-success"><i class="fa fa-eye"></i> Lihat Absensi</a>
       
        </td>

    </tr>
    <?php $i++; } ?>
</tbody>
</table>

<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      dateFormat:"yy-mm-dd",
      numberOfMonths: 2,
    changeYear: true,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
  });
  </script>
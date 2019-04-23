<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
  <?php $i=1; foreach($absen as $absen) {

   ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $absen['nis']; ?></td>
        <td><?php echo $absen['nama_depan']; ?></td>
        <td><?php echo $absen['kelas']; ?></td>
        <td><?php echo $absen['keterangan']; ?></td>
        <td class="center">
        <a href="<?php echo base_url('guru/absensi/edit/'.$absen['id_absensi']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

        <a href="<?php echo base_url('guru/absensi/delete_siswa/'.$absen['id_siswa']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus kelas ini?')"><i class="fa fa-trash"></i></a>
       
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
      numberOfMonths: 2,
    dateFormat: "yy-mm-dd",
    changeYear: true,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
  });
  </script>
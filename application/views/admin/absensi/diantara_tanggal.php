            <div class="message">
                <?php
                if (isset($read_set_value)) {
                    echo $read_set_value;
                }
                if (isset($message_display)) {
                    echo $message_display;
                }
                ?>
            </div>

            <div id="show_form">
            <form action="<?php echo base_url('guru/absensi/laporan');?>" method="post">

           <div class="col-md-6">
	          <label>Dari Tanggal</label>
	          <div class="form-group input-group">
	            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>            
	            <input type="date" name="date_from" class="form-control">
	          </div>
         	</div>
           <div class="col-md-6">
	          <label>Sampai Tanggal</label>
	          <div class="form-group input-group">
	            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>            
	            <input type="date" name="date_to" class="form-control">
	          </div>
         	</div>   
         	<div class="col-md-12">
         	<p align="right"><button class="btn btn-primary">Lihat</button></p>    
         	</div>
         	</form>  	
                <div class="message">
                    <?php
                    if (isset($result_display)) {
  					$_SESSION['result'] = $result_display;
                    ?>

                        <label>Cetak :</label>
                        <a class="btn btn-danger" href="<?php echo base_url('guru/absensi/cetak_pdf');?>" target="_blank"><i class="fa fa-print"></i> PDF</a>

						<a class="btn btn-success" href="<?php echo base_url('guru/absensi/cetak_excel');?>"><i class="fa fa-print"></i> Excel</a>

						<br><br>

                       <?php if ($result_display == 'No record found !') {
                            echo $result_display;
                        } else {
                            echo "<table class='table table-striped table-bordered table-hover'>";
                            echo '<tr>
                            		<th>NO</th>
                                    <th>NIS</th>
                            		<th>NAMA SISWA</th>
                            		<th>TANGGAL</th>
                            		<th>KETERANGAN</th>
                            	<tr/>';
                            $i=1; foreach ($result_display as $value) {
                                echo '<tr>' . 
                                	 '<td>' . $i . '</td>' . 
                                     '<td>' . $value->nis . '</td>' .
                                	 '<td>' . $value->nama_depan .' '. $value->nama_belakang . '</td>' .
                                	 '<td>' . $value->tanggal . '</td>' .
                                	 '<td>' . $value->keterangan . '</td>' . 
                                	 '<tr/>';
                            $i++; }
                            echo '</table>';
                        }
                    }
                    ?>

                </div>
            </div>
        </div>       
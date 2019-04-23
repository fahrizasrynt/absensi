<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
    selector: "#isi",
    height: 250,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<style>
#imagePreview {
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

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

<form action="<?php echo base_url('admin/orangtua/edit/'.$orangtua['id_orangtua']) ?>" method="post" enctype="multipart/form-data">

<div class="col-md-6">
	<h3>Data orangtua</h3><hr>
	    <div class="form-group">
		    <label>Nama Depan</label>
		    <input type="text" name="nama_depan" placeholder="Nama Depan" value="<?php echo $orangtua['nama_depan'] ?>" required class="form-control">
	    </div>
	    <div class="form-group">
		    <label>Nama Belakang</label>
		    <input type="text" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $orangtua ['nama_belakang'] ?>" required class="form-control">
	    </div>	
	    <div class="form-group">
		    <label>Pendidikan</label>
		    <input type="text" name="pendidikan" placeholder="Pendidikan" value="<?php echo $orangtua ['pendidikan'] ?>" required class="form-control">
	    </div>		            
	    <div class="form-group">
		    <label>Nomer Handphone</label>
		    <input type="number" name="no_hp" placeholder="Nomer Handphone" value="<?php echo $orangtua ['no_hp'] ?>" required class="form-control">
	    </div>	    
	    <div class="form-group">
	        <label>Agama</label>
	        <select name="agama" class="form-control">
	            <option value="islam">Islam</option>	            
	            <option value="kristen">Kristen</option>	            
	            <option value="hindu">Hindu</option>	            
	            <option value="budha">Budha</option>	            
	        </select>
	    </div> 
	    <div class="form-group">
		    <label>Pekerjaan</label>
		    <input type="text" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $orangtua ['pekerjaan'] ?>" required class="form-control">
	    </div>	  


	</div>

	<div class="col-md-6">
	<h3>Foto & Alamat</h3><hr>
	    <div class="form-group">
	    	<label>Upload Foto</label>
      		<input type="file" name="foto" class="form-control" id="file">
        	<div id="imagePreview">
        		<img src="<?php echo base_url('assets/upload/image/'.$orangtua['foto']);?>" width="150px;">
        	</div>
	    </div>	
	    <div class="form-group">
		    <label>Alamat</label>
		    <textarea class="form-control" name="alamat" placeholder="Alamat Siswa"><?php echo $orangtua['alamat'];?></textarea>
	    </div>	    	    
	</div>

	<div class="col-md-6" id="hidden_div" >
	<h3>Data Login</h3><hr>
	    <div class="form-group">
	    	<label>Username</label>
      		<input type="text" name="username" class="form-control" value="<?php echo $orangtua['username'];?>" required>
	    </div>	   
	    <div class="form-group">
	    	<label>Password</label>
      		<input type="password" name="password" class="form-control" placeholder="Ubah Password" required>
	    </div>	
	    <div class="form-group">
		    <label>Email</label>
		    <input type="email" class="form-control" name="email" value="<?php echo $orangtua['email'];?>" required>
	    </div>	    	    
	</div>	
	<div class="col-md-12">
		<input type="submit" name="submit" value="Update orangtua" class="btn btn-primary">
	</div>			
</form>

<?php
require_once('koneksi.php');
session_start();
include 'header.php';
if(isset($_SESSION['sess_user'])) {
	if(isset($_POST) & !empty($_POST)){
		$dokter = mysqli_real_escape_string($conn,$_SESSION['sess_user']);
		$nama = mysqli_real_escape_string($conn,$_POST['nama']);
		$diagnosis = mysqli_real_escape_string($conn,$_POST['diagnosis']);
		$tindakan = mysqli_real_escape_string($conn,$_POST['tindakan']);

		$create_rj = "INSERT INTO rawat_jalan (dokter,nama,diagnosis,tindakan) VALUES ('$dokter','$nama','$diagnosis','$tindakan')";
		$res = mysqli_query($conn, $create_rj);
		if($res){
			$msg = true;
			header('location: http://localhost:81/tesead/rawatjalan.php');
		}else{
			$msg = false;
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>TAMBAH DATA</title>
</head>
<body>
<div class="container" style="margin: 60px">
	<div class="row" style="margin: auto">
		<?php
		if (isset($msg)) {
			if($msg==true) {
				echo "<script type='text/javascript'>alert('Data Ditambahkan!')</script>";
			} else {
				echo "<script type='text/javascript'>alert('Data Gagal Ditambahkan!')</script>";
			}
		}
		?>
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
		<h2>TAMBAH DATA PASIEN</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" name="nama"  class="form-control" id="input1" placeholder="Nama Pasien" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Diagnosis</label>
			    <div class="col-sm-10">
			      <input type="text" name="diagnosis"  class="form-control" id="input1" placeholder="Diagnosis" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Tindakan</label>
			    <div class="col-sm-10">
			      <textarea name="tindakan" rows="50" cols="20" class="form-control" id="input1" placeholder="Tindakan"></textarea>
			    </div>
			</div>


			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>
	</div>
</div>
</body>
</html>

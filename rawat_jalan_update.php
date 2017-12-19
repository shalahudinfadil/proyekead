<?php
require_once('koneksi.php');
session_start();
include 'header.php';
$id = $_GET['id'];
$SelSql = "SELECT * FROM `rawat_jalan` WHERE id=$id";
$res = mysqli_query($conn, $SelSql);
$r = mysqli_fetch_assoc($res);
if(isset($_POST) & !empty($_POST)){
	$nama = mysqli_real_escape_string($conn,$_POST['nama']);
	$diagnosis = mysqli_real_escape_string($conn,$_POST['diagnosis']);
	$tindakan = mysqli_real_escape_string($conn,$_POST['tindakan']);

	$UpdateSql = "UPDATE `rawat_jalan` SET nama='$nama', diagnosis='$diagnosis', tindakan='$tindakan' WHERE id=$id";
	$res = mysqli_query($conn, $UpdateSql);
	if($res){
		header('location: http://localhost:81/tesead/rawatjalan.php');
	}else{
		$fmsg = "Gagal Edit Data";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>UBAH DATA</title>
</head>
<body>
<div class="container" style="margin-top:60px">
	<div class="row">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
		<h2>UBAH DATA PASIEN</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" name="nama"  class="form-control" id="input1" value="<?php echo $r['nama']; ?>" placeholder="Nama Pasien" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Diagnosis</label>
			    <div class="col-sm-10">
			      <input type="text" name="diagnosis"  class="form-control" id="input1" value="<?php echo $r['diagnosis']; ?>" placeholder="Diagnosis" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Tindakan</label>
			    <div class="col-sm-10">
			      <textarea name="tindakan" cols="50" rows="50" class="form-control" id="input1" placeholder="Tindakan"><?php echo $r['tindakan']; ?></textarea>
			    </div>
			</div>


			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>
	</div>
</div>
</body>
</html>

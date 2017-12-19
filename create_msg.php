<?php
require_once('koneksi.php');
session_start();
include 'header.php';
if(isset($_SESSION['sess_user'])) {
	if(isset($_POST['submit'])) {

	if(isset($_POST) && !empty($_POST)) {

		$sender = mysqli_real_escape_string($conn,$_SESSION['sess_user']);
		$receiver = mysqli_real_escape_string($conn,$_POST['receiver']);
		$subject = mysqli_real_escape_string($conn,$_POST['subject']);
		$msg = mysqli_real_escape_string($conn,$_POST['msg']);

		$cekuser = mysqli_query($conn,"SELECT user FROM akun WHERE user='".$receiver."'");
		$cekhasil = mysqli_num_rows($cekuser);

		if($cekhasil!=0) {
			$cekreceiver = mysqli_fetch_assoc($cekuser);

			if($cekreceiver!=$_SESSION['sess_user']) {

				$send = "INSERT INTO msg (sender,receiver,subject,message)
				VALUES('$sender','$receiver','$subject','$msg')";
				$sendquery = mysqli_query($conn,$send);

				if($sendquery) {
					$sent = true;
				} else {
					$sent = false;
				}
			} else {
				$cekkirim = "Anda Tidak Bisa Mengirim Ke Diri Anda Sendiri!";

			}
		} else {
			$cekuserada = "User Tidak Ada";

		}
	} else {
		$cekisi = "Isi Form dengan Benar!";

	}
	}
} else {
	header("Location: http://localhost:81/tesead/login.php");
}


?>

<head>
<title>TULIS PESAN</title>
<style>
.writebox{
    background: white;
    color: black;
    margin-top: 5%;
	margin-left: 125px;
    left: 15%;
    padding: 20px;
    box-shadow: 0 8px 50px -2px #000;
    border-radius:5px;
	position: absolute;
	width: 800px;
	height: 500px;


}
.logo {
	width: 80px;
	height: 80px;
	margin-left: 3%;
	margin-top: 1%;
}
.text {
	float: right;
	padding-right: 5%;
	padding-top: 5%;
}
.writebox_content{
    padding:5% 11% 5% 11%;
}
.label {
		margin: auto;
}
.textarea {
	width: 500px;
	height: 150px;
	max-height: 150px;
	resize: none;
	overflow-y: scroll;
}
.resetdiv {
	margin-right: 23px;
	float: right;
}
.kirimbtn {
	float: left;
	margin-left: 45px;
}
</style>
</head>
<body>
	<div class="container">
		<?php
		if (isset($sent)) {
			if($sent==true) {
				echo "<script type='text/javascript'>alert('Pesan Terkirim!')</script>";
			} else {
				echo "<script type='text/javascript'>alert('Pesan Gagal Terkirim!')</script>";
			}
		}
		?>
		<?php if(isset($cekkirim)){ ?><div class="alert alert-danger" role="alert"> <?php echo $cekkirim; ?> </div><?php } ?>
		<?php if(isset($cekuserada)){ ?><div class="alert alert-danger" role="alert"> <?php echo $cekuserada; ?> </div><?php } ?>
		<?php if(isset($cekisi)){ ?><div class="alert alert-danger" role="alert"> <?php echo $cekisi; ?> </div><?php } ?>
		<div class="col-md-3"></div>
		<div class="col-md-6 writebox">
			<div class="row">
				<div class="col-md-4 logo">
					<i class="fa fa-paper-plane fa-5x"></i>
				</div>
				<div class="col-md-7 text">
					<h2>TULIS PESAN</h2>
				</div>
			</div>
			<div class="row writebox_content">
				<form method="POST" class="col-md-12">
					<div class="input-group input-group-sm">
						<label for="receiver" class="label">Kepada</label>&nbsp;<input required class="form-control" type="text" name="receiver" placeholder="User Tujuan">
					</div>
					<br>
					<div class="input-group input-group-sm">
						<label for="subject" class="label">Subjek</label>&nbsp;&nbsp;<input class="form-control" type="text" name="subject" placeholder="Subjek Pesan">
					</div>
					<br>
					<div class="input-group input-group-sm">
						<label for="msg" >Pesan</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<textarea name="msg" class="textarea" rows="30" cols="100"></textarea>
					</div>
					<br>
					<div class="row kirimbtn">
						<div class="col-md-4">
							<button class="btn btn-success" type="submit" name="submit"><i class="fa fa-paper-plane-o"></i>&nbsp; KIRIM</button>
						</div>
						&nbsp;
						&nbsp;
						<div class="col-md-4">
							<button class="btn btn-warning" type="reset"><i class="fa fa-eraser"></i>&nbsp; RESET</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3"></div>
</body>

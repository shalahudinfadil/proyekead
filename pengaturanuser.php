<?php
require_once('koneksi.php');
session_start();
if(!isset($_SESSION['sess_user'])) {
	header('Location: http://localhost:81/tesead/login.php');
} else {
	if(!empty($_POST['passlama']) && !empty($_POST['passbaru'])) {
		$passlama = $_POST['passlama'];
		$passbaru = $_POST['passbaru'];
		
		$cekquery = mysqli_query($conn,"SELECT pass FROM akun WHERE pass='".$passlama."'");
		$hasil = mysqli_fetch_assoc($cekquery);
		
		if($hasil) {
			$dbpass = $hasil['pass'];
			
			if($passlama==$dbpass) {
			$gantiquery = mysqli_query($conn,"UPDATE akun SET pass='".$passbaru."' WHERE pass='".$passlama."'");
			$res = mysqli_query($conn,$gantiquery);
			$post = true;
		} else {
			$post = false;
		}
		}
		
		
			
	}
}

include 'header.php';
?>

<head>
<title>PENGATURAN</title>
<style>
.settingbox{  
    background: white;
    color: black;    
    margin-top: 10%;
	margin-left: 125px;
    left: 25%;
    padding: 20px;   
    box-shadow: 0 8px 50px -2px #000;
    border-radius:5px;
	position: absolute;
	width: 500px;
	height: 450px;
}
.logo {
	width: 80px;
	height: 80px;
	margin-left: 3%;
	margin-top: 1%;
}
.text {
	float: right;
	padding-right: 25%;
	padding-top: 5%;
}
.settingbox_content{
    padding:5% 11% 5% 11%;
}
.resetdiv {
	margin-right: 23px;
	float: right;
}
.gantibtn {
	float: left;
	margin-left: 45px;
}
</style>
</head>

<body>
		<div class="container">
		<?php
		if(isset($post)) {
			if($post) {
				
				echo "<script type='text/javascript'>alert('Password Diganti!')</script>";
			}else {	
				echo "<script type='text/javascript'>alert('Gagal Mengganti Password!')</script>";
			}
		}
	?>
			<div class="col-md-4"></div>
			<div class="col-md-4 settingbox">
				<div class="row">
					<div class="col-md-4 logo">
						<i class="fa fa-cog fa-5x"></i>
					</div>
					<div class="col-md-4 text">
						<h2>PENGATURAN</h2>
					</div>
				</div>
				<div class="row settingbox_content">
					<div class="col-md-12">
						<p>GANTI PASSWORD</p>
					</div>
					<form method="POST">
					<div class="input-group input-group-sm">
						Password Lama  &nbsp; <input class="form-control" type="password" name="passlama" placeholder="********">
					</div>
					<br>
					<div class="input-group input-group-sm">
						Password Baru  &nbsp;&nbsp; <input class="form-control" type="password" name="passbaru" placeholder="********">
					</div>
					<br>
					<div class="row gantibtn">
						<div class="col-md-4">
							<button class="btn btn-success" name="submit"><i class="fa fa-floppy-o"></i>&nbsp; GANTI</button>
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
</body>

<?php
require_once('koneksi.php');
if (isset($_POST['submit'])) {
	if(!empty($_POST['user']) && !empty($_POST['pass'])) {
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$loginquery = mysqli_query($conn,"SELECT * FROM akun WHERE user='".$user."' AND pass='".$pass."'");
		$numrow = mysqli_num_rows($loginquery);
		
		if($numrow!=0) {
			while($row=mysqli_fetch_assoc($loginquery)) {
				$dbuser = $row['user'];
				$dbpass = $row['pass'];
			}
			if($user==$dbuser && $pass==$dbpass) {
				
				session_start();
				$_SESSION['sess_user']=$user;
				
				header("Location: http://localhost:81/tesead/menu.php");
			}
		} else {
			$fmsg2 = "Username atau Password salah!";
		}
	} else {
		$fmsg1="Isi Username dan Password Anda!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>LOGIN</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- font awesome-->
<script src="https://use.fontawesome.com/a3194b5c5b.js"></script>

<style>
.loginbg {
	background-image: url(http://backstorysports.com/wp-content/uploads/2017/09/Great-Logos-For-Hospital-64-With-Additional-Name-Logo-Wallpaper-Maker-with-Logos-For-Hospital.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
}
.loginbox{  
    background: white;
    color: black;    
    margin-top: 15%;
    left: 0;
    padding: 20px;   
    box-shadow: 0 8px 50px -2px #000;
    border-radius:5px;

}
.logo{
    width: 45px; 
    height: 45px;
    margin-left: 10%;
}
.logintext {
	font-family: Impact, Charcoal, sans-serif;
	font-size: 27px;
	color: #82C226;
	float: right;
	padding-right: 25%;
	padding-top: 1%;
}
.loginbox_content{
    padding:5% 11% 5% 11%;
}
.masukdiv {
	margin-right: 23px;
	float: right;
}
.daftarbtn {
	float: left;
	margin-left: 45px;
}
</style>
</head>
<body class="loginbg">
	<div class="container">
		<?php if(isset($fmsg1)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg1; ?> </div><?php } ?>
		<?php if(isset($fmsg2)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg2; ?> </div><?php } ?>
		<div class="col-md-4 loginbox">
			<div class="row">
				<div class="col-md-8">
					<img src="http://www.pomgen.gov.pg/wp-content/uploads/2013/09/hospital-logo.png" class="logo">
				</div>
				<div class="col-md-4 logintext">
					<p>LOGIN</p>
				</div>
			</div>
			<form form method="POST">
			<div class="row loginbox_content">
				
				<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<i class="fa fa-user-circle"></i>
					</span>
					<input class="form-control" placeholder="Username" type="text" name="user">
				</div>
				<br>
				<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<i class="fa fa-key"></i>
					</span>
					<input class="form-control" type="password" placeholder="********" name="pass">
				</div>
				
			</div>
			<div class="row masukdiv">
				<div class="col-4">
						<button class="btn btn-success" name="submit"><i class="fa fa-sign-in"></i> MASUK</button>
				</div>
			</div>
			</form>
			<div class="row daftarbtn">
				<form>
					<button class="btn btn-primary"><i class="fa fa-user-plus"></i> DAFTAR</button>
				</form>
			</div>
	</div>
</body>
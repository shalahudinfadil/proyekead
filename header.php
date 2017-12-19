<!DOCTYPE html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <!-- font awesome-->
<script src="https://use.fontawesome.com/a3194b5c5b.js"></script>
</head>
</body>
	<nav class="navbar navbar-expand-sm fixed-top bg-info navbar-dark">
		<a class="navbar-brand" href="http://localhost:81/tesead/menu.php"><i class="fa fa-hospital-o"></i>&nbsp;HOME</a>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
					PASIEN
				</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="http://localhost:81/tesead/rawatjalan.php">Rawat Jalan</a>
				<a class="dropdown-item" href="#">Rawat Inap </a>
				<a class="dropdown-item" href="#">Tindakan Khusus</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
					FARMASI & LAB
				</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Daftar Obat-Obatan</a>
				<a class="dropdown-item" href="#">Resep Obat</a>
				<a class="dropdown-item" href="#">Laboratorium</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
					ADMINISTRASI
				</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Jadwal Shift</a>
				<a class="dropdown-item" href="http://localhost:81/tesead/msg.php">Pesan Internal</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<span class="navbar-text"> SELAMAT DATANG, <?=$_SESSION['sess_user'];?>! </span>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				<i class="fa fa-cogs"></i>
				</a>
				<ul class="dropdown-menu" style="right:0; left:auto;">
				<a class="dropdown-item" href="http://localhost:81/tesead/pengaturanuser.php">Pengaturan</A>
				<a class="dropdown-item" href="http://localhost:81/tesead/logout.php">LOGOUT</a>
				</ul>
			</li>
		</ul>	
		</nav>
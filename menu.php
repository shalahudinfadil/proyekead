<?php
session_start();
if(!isset($_SESSION["sess_user"])) {
	header("Location: http://localhost/tesead/login.php");
} else {
	
}

include 'header.php';
?>
<head>
<title>BERANDA</title>
<style>
.menubox {
	position: absolute;
	left: 400px;
	top: 150px;
	width: 600px;
	background-color: white;
	color: black;
	box-shadow: 0 8px 50px -2px #000;
	border-radius: 5px;
}
.header {
	font-family: Lucida Console;
	color: #052133;
	margin: auto;
}
.hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}
</style>
</head>
<body>
	<div class="container" style="margin-top: 70px">
			<div class="row menubox">
			<div class="col-md-3"></div>
				<div class="col-md-8 header">
					<h2>BULLETIN INTERNAL</h2>
				</div>
			<div class="col-md-1"></div>
			<hr/>
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<p>asdasdasd</p>
			</div>
			<div class="col-md-1"></div>
			</div>
			
	</div>
	</div>
</body>	
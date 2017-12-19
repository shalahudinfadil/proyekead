<?php
require_once('koneksi.php');
session_start();
include 'header.php';
if(isset($_SESSION['sess_user'])) {
  $id = $_GET['id'];
  $select_msg="SELECT * FROM msg WHERE id=$id";
  $res=mysqli_query($conn,$select_msg);
?>
<head>
<title>BACA PESAN</title>
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
		<div class="col-md-3"></div>
		<div class="col-md-6 writebox">
			<div class="row">
				<div class="col-md-4 logo">
          <i class="fa fa-envelope-o fa-5x"></i>
				</div>
				<div class="col-md-7 text">
					<h2>BACA PESAN</h2>
				</div>
			</div>
			<div class="row writebox_content">
        <div class="col-md-12">
  						<table class="table">
  						<thead>
  							<tr>
  								<th>PESAN</th>
  								<td>
  							</tr>
  						</thead>
  						<tbody>
  							<?php
  							while($r = mysqli_fetch_assoc($res)){
  							?>
  							<tr>
  								<td><?php echo $r['id']; ?>&nbsp;/&nbsp;<?php echo $r['sender']; ?>&nbsp;<?php echo $r['time']; ?><br><?php echo $r['subject']; ?>&nbsp;<?php echo $r['message']; ?></td>
  								<td>
  							</tr>
  						<?php }
  							}?>
  					</tbody>
  				</table>
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

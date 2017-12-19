<?php
require_once('koneksi.php');
session_start();
include 'header.php';
if(isset($_SESSION['sess_user'])) {
	$user = $_SESSION['sess_user'];

	$pesanquery = mysqli_query($conn,"SELECT * FROM msg WHERE receiver='".$user."'");
?>
<head>
<title>KOTAK PESAN</title>
<style>
.inbox{
    background: white;
    color: black;
    margin-top: 5%;
	margin-left: 125px;
    left: 25%;
    padding: 20px;
    box-shadow: 0 8px 50px -2px #000;
    border-radius:5px;
	position: absolute;
	width: 500px;
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
.inbox_content{
    padding:3% 5% 3% 5%;
}
.table-fixed{
  width: 100%;
  background-color: #f3f3f3;
  tbody{
    height:50px;
	max-height: 50px;
	resize: none;
    overflow-y:auto;
    width: 100%;
    }
  thead,tbody,tr,td,th{
    display:block;
  }
  tbody{
    td{
      float:left;
    }
  }
  thead {
    tr{
      th{
        float:left;
       background-color: #f39c12;
       border-color:#e67e22;
      }
    }
  }
}

</style>
</head>
<body>
<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 inbox">
			<div class="row">
				<div class="col-md-4 logo">
					<i class="fa fa-inbox fa-5x"></i>
				</div>
				<div class="col-md-4 text">
					<h2>INBOX</h2>
				</div>
				<div class="col-md-2 text">
					<a href="http://localhost:81/tesead/create_msg.php" class="btn btn-info btn-sm">Kirim Pesan</a>
				</div>
			</div>
			<div class="inbox_content">
						<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Dari</th>
								<th>Subjek</th>
								<th>Pesan</th>
								<th>Waktu</th>
								<td>
							</tr>
						</thead>
						<tbody>
							<?php
							while($r = mysqli_fetch_assoc($pesanquery)){
							?>
							<tr>
								<th scope="row"><?php echo $r['id']; ?></th>
								<td><a href="http://localhost:81/tesead/read_msg.php?id=<?php echo $r['id'];?>" style="color: #000;"><?php echo $r['sender']; ?></a></td>
								<td><?php echo $r['subject']; ?></td>
								<td><?php echo $r['message']; ?></td>
								<td><?php echo $r['time']; ?></td>
								<td>
							</tr>
						<?php }
							}?>
					</tbody>
				</table>
			</div>
	</div>
</div>
  </div>
</div>

</body>
</html>

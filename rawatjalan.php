<?php
require_once('koneksi.php');
session_start();
include 'header.php';
if(isset($_SESSION['sess_user'])) {
	$jalanquery = "SELECT * FROM rawat_jalan WHERE dokter='".$_SESSION['sess_user']."'";
	$rawatjalan = mysqli_query($conn,$jalanquery);
?>

<head>
<title>RAWAT JALAN</title>
<style>
.inbox{
    background: white;
    color: black;
    margin-top: 5%;
    box-shadow: 0 8px 50px -2px #000;
    border-radius:5px;
	position: relative;
	width: 100%;
}
.logo {
	width: 80px;
	height: 80px;
	margin-left: 3%;
	margin-top: 3%;
}
.text {
	float: right;
	padding-left: 10%;
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

<script>
function filteredSearch() {
var input, filter, table, tr, td, i;
input = document.getElementById("input");
filter = input.value.toUpperCase();
table = document.getElementById("table");
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[0];
	if (td) {
		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		} else {
			tr[i].style.display = "none";
		}
	}
}
}
</script>

</head>
<body>
<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-2 logo">
					<i class="fa fa-medkit fa-5x"></i>
				</div>
				<div class="col-md-6 text">
					<h2>RAWAT JALAN</h2>
				</div>
				<div class="col-md-2 text">
					<a href="http://localhost:81/tesead/rawat_jalan_create.php" class="btn btn-info btn-lg">Tambah Pasien</a>
				</div>
			</div>
			<div class="col-md-12">
				<input type="text" id="input" onkeyup="filteredSearch()" placeholder="Cari Tabel Pasien"/>
			</div>
			<div class="col-md-12">
						<table class="table" id="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama</th>
								<th>Diagnosis</th>
								<th>Tindakan</th>
								<th>Tanggal</th>
								<td>
							</tr>
						</thead>
						<tbody>
							<?php
							while($r = mysqli_fetch_assoc($rawatjalan)){
							?>
							<tr>
								<th scope="row"><?php echo $r['id']; ?></th>
								<td><?php echo $r['nama']; ?></td>
								<td><?php echo $r['diagnosis']; ?></td>
								<td><?php echo $r['tindakan']; ?></td>
								<td><?php echo $r['tanggal']; ?></td>
								<td>
								<td>
									<a href="http://localhost:81/tesead/rawat_jalan_update.php?id=<?php echo $r['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" ></i></a>
									<a href="http://localhost:81/tesead/rawat_jalan_delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								</td>
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

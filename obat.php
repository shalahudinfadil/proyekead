<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');

$obat = "SELECT id,nama FROM obat ORDER BY nama ASC";
$res = mysqli_query($conn,$obat);
?>

<html>
<head>
  <title>INFO OBAT</title>
</head>
<body>
  <div class="container" style="padding-left: 100px;">
    <div class="col s6">
      <input type="text" id="input" onkeyup="filteredSearch()" placeholder="Cari obat"/>
    </div>
      <table class="highlight" id="table">
        <thead>
          <tr>
            <td>NAMA</td>
            <td><?php if($_SESSION['sess_user']==='admin') {?>
                <a href="http://localhost/EAD/obat_create.php">Tambah Entri</a> <?php } ?></td>
          </tr>
        </thead>
        <tbody>
          <?php while($r = mysqli_fetch_assoc($res)) { ?>
          <tr>
            <td><a href="http://localhost/EAD/obat_read.php?id=<?php echo $r['id'];?>"><?php echo $r['nama'];?></a></td>

            <td><?php if($_SESSION['sess_user']==='admin') {?>
                <a href="http://localhost/EAD/obat_update.php?id=<?php echo $r['id'];?>" class="waves-effect waves-light yellow btn"><i class="material-icons">edit</i></a>
                <a href="http://localhost/EAD/obat_delete.php?id=<?php echo $r['id'];?>" class="waves-effect waves-light red btn"><i class="material-icons">delete_forever</i></a><?php } ?></td>
                <?php } ?>
          </tr>
        </tbody>
      </table>
  </div>
</body>

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

</html>

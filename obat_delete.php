<?php
require_once('koneksi.php');

$id = $_GET['id'];
$obat_delete = "DELETE FROM obat WHERE id=$id";
$res = mysqli_query($conn,$obat_delete);

if($res) {
  header("Location: http://localhost/EAD/obat.php");
} else {

}
?>

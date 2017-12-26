<?php
require_once('koneksi.php');

$id = $_GET['id'];
$penyakit_delete = "DELETE FROM penyakit WHERE id=$id";
$res = mysqli_query($conn,$penyakit_delete);

if($res) {
  header("Location: http://localhost/EAD/penyakit.php");
} else {

}
?>

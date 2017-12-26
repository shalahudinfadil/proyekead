<?php
require_once('koneksi.php');

$id = $_GET['id'];
$klinik_delete = "DELETE FROM klinik WHERE id=$id";
$res = mysqli_query($conn,$klinik_delete);

if($res) {
  header("Location: http://localhost/EAD/klinik.php");
} else {

}
?>

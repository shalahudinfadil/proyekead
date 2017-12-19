<?php
require_once('koneksi.php');
session_start();
$id = $_GET['id'];
$delete_rj = "DELETE FROM rawat_jalan WHERE id=$id";
$res = mysqli_query($conn, $delete_rj);
if($res){
	header('location: http://localhost:81/tesead/rawatjalan.php');
}else{
	echo "Gagal Menghapus";
}
?>

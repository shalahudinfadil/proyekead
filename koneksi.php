<?php 
$conn = mysqli_connect('localhost','root','','ead') or die(mysqli_error($conn));
$selectdb = mysqli_select_db($conn,'ead') or die("Tidak Bisa Terhubung ke Database");
?>
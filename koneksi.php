<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "kebudayaan";

$conn = mysqli_connect($server,$user,$pass,$db) or die(mysqli_error($conn));
$selectdb = mysqli_select_db($conn,$db) or die(mysqli_error($conn));
?>

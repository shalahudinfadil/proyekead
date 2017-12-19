<?php
reqire_once('koneksi.php');

$db = "CREATE DATABASE ead";
if(mysqli_query($conn,$db)) {
  $rawatjalan = "CREATE TABLE `rawat_jalan` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `dokter` varchar(255) NOT NULL,
 `nama` varchar(255) NOT NULL,
 `diagnosis` text NOT NULL,
 `tindakan` text NOT NULL,
 `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1";
$create_rawat_jalan = mysqli_query($conn,$rawatjalan);

$msg = "CREATE TABLE `msg` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `sender` varchar(205) NOT NULL,
 `receiver` varchar(255) NOT NULL,
 `subject` varchar(255) NOT NULL,
 `message` text NOT NULL,
 `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";
$create_msg = mysqli($conn,$msg);

$akun = "CREATE TABLE `akun` (
 `user` varchar(255) NOT NULL,
 `pass` varchar(255) NOT NULL,
 PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$create_akun = mysqli_query($conn,$akun);
} else {

}

 ?>

<?php
$connent = mysqli_connect('localhost','root','');

if ($connect) {
  $createdb = "CREATE DATABASE `kebudayaan`";
  $sql = mysqli_query($connect,$createdb);
  if($sql){
    $akun = "CREATE TABLE `akun` (
            `user` varchar(255) NOT NULL,
             `pass` varchar(60) NOT NULL,
             PRIMARY KEY (`user`)
           ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    $akunsql = mysqli_query($connect,$akun);

    $klinik = "CREATE TABLE `klinik` (
               `id` int(11) NOT NULL AUTO_INCREMENT,
               `nama` varchar(255) NOT NULL,
               `alamat` varchar(255) NOT NULL,
               `telfon` varchar(12) NOT NULL,
               `gambar` varchar(255) NOT NULL,
               PRIMARY KEY (`id`)
             ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1";
    $kliniksql = mysqli_query($connect,$klinik);

    $obat = "CREATE TABLE `obat` (
             `id` int(11) NOT NULL AUTO_INCREMENT,
             `nama` varchar(255) NOT NULL,
             `jenis` varchar(50) NOT NULL,
             `manfaat` text NOT NULL,
             `peringatan` text NOT NULL,
             `gambar` varchar(255) NOT NULL,
             `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
             PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1";
    $obatsql = mysqli_query($connect,$obat);

    $penyakit = "CREATE TABLE `penyakit` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                 `nama` varchar(255) NOT NULL,
                 `pengertian` text NOT NULL,
                 `penyebab` text NOT NULL,
                 `gejala` text NOT NULL,
                 `pengobatan` text NOT NULL,
                 `pencegahan` text NOT NULL,
                 `gambar` varchar(255) NOT NULL,
                 `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                 PRIMARY KEY (`id`)
               ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1";
    $penyakitsql = mysqli_query($connect,$penyakit);
  }
}
 ?>

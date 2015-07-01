<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
      echo "<link href='style.css' rel='stylesheet' type='text/css'>
      <center>Untuk mengakses modul, Anda harus login <br>";
      echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
      include "../../config/koneksi.php";

      $modul = $_GET['modul'];
      $act   = $_GET['act'];

      $nip            = $_POST['nip'];
      $nama_kelas     = $_POST['nama_kelas'];
      $id_mp          = $_POST['id_mp'];
      $jumlah_siswa   = $_POST['jumlah_siswa'];

      //echo "$nip $nama_kelas $id_mp $jumlah_siswa $limited_value";
      if ($modul=='ruang-guru' AND $act=='hapus'){
          mysql_query("DELETE FROM `sesi_kelas_online` WHERE `id_sko`='$_GET[id_sko]'"); 
          header('location:../../index.php?modul='.$modul);
      }
      elseif ($modul=='buat-kelas' AND $act=='input'){
        mysql_query("INSERT INTO `sesi_kelas_online`(`id_sko`,`nip`,`nama_kelas`,`id_mp`) VALUES(NULL,'$nip','$nama_kelas','$id_mp')");             
        header('location:../../index.php?modul=ruang-guru');
      }
      elseif ($modul=='buat-kelas' AND $act=='update'){
        mysql_query("UPDATE `user` SET `password`=MD5(`username`) WHERE `username`='$_GET[username]'");             
        header('location:../../index.php?modul='.$modul);
      }
}
?>
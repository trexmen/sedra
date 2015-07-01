<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
      echo "<link href='style.css' rel='stylesheet' type='text/css'>
      <center>Untuk mengakses modul, Anda harus login <br>";
      echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
      include "../../config/koneksi.php";

      $modul=$_GET['modul'];
      $act=$_GET['act'];
      $halaman=$_GET['halaman'];

      
      if ($modul=='daftar-guru' AND $act=='hapus'){
          mysql_query("DELETE FROM `user` WHERE username='$_GET[username]'"); 
          header('location:../../index.php?modul='.$modul.'&halaman='.$halaman);
      }
      elseif ($modul=='daftar-guru' AND $act=='reset'){
        mysql_query("UPDATE `user` SET `password`=MD5(`username`) WHERE `username`='$_GET[username]'");             
        header('location:../../index.php?modul='.$modul.'&halaman='.$halaman);
      }
}
?>
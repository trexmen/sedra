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

      
    if ($modul=='pilih-kelas' AND $act=='hapus'){
          mysql_query("DELETE FROM `kelas` WHERE id_kelas='$_GET[id_kelas]'"); 
          header('location:../../index.php?modul=beranda');
      }
    elseif ($modul=='pilih-kelas' AND $act=='input'){
          mysql_query("INSERT INTO `kelas`(`id_kelas`,
                                                `nis`,                                                      
                                                `id_sko`) 
                                          VALUES ( NULL,
                                                '$_GET[nis]',                                                      
                                                '$_GET[id_sko]')");
          header('location:../../index.php?modul=beranda');                       
      }
      elseif ($modul=='pilih-kelas' AND $act=='update'){              
          header('location:../../index.php?modul=beranda');
      }
}
?>

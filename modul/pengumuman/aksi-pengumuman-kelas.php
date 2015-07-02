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

      $id_sko     = $_POST['id_sko'];
      $nip        = $_POST['nip'];
      $deskripsi  = $_POST['deskripsi'];
      $judul      = $_POST['judul'];

      //echo "$nip $nama_kelas $id_mp $jumlah_siswa $limited_value";
      if ($modul=='buat-kelas' AND $act=='hapus'){
          mysql_query("DELETE FROM `user` WHERE username='$_GET[username]'"); 
          header('location:../../index.php?modul='.$modul);
      }
      elseif ($modul=='ruang-guru' AND $act=='input'){
        mysql_query("INSERT INTO `pengumuman_kelas`(`id_pengumuman`,`judul`,`deskripsi`,`id_sko`) VALUES(NULL,'$judul','$deskripsi','$id_sko')");             
        header('location:../../index.php?modul='.$modul);
      }
      elseif ($modul=='buat-kelas' AND $act=='update'){
        mysql_query("UPDATE `user` SET `password`=MD5(`username`) WHERE `username`='$_GET[username]'");             
        header('location:../../index.php?modul='.$modul);
      }
}
?>
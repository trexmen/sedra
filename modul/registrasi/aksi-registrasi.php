<?php

include "../../config/koneksi.php";
include "../../config/fungsi-thumb.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$ulangiPassword = md5($_POST['ulangi_password']);

$nip = $_POST['nip'];

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas =  $_POST['kelas'];
$jurusan = "";
$tempat = $_POST['tempat'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$foto= "";


$tipe=$_POST['tipe'];
$modul = 'reg';

$lokasi_file    = $_FILES['fupload']['tmp_name'];
$tipe_file      = $_FILES['fupload']['type'];
$nama_file      = $_FILES['fupload']['name'];
$acak           = rand(000000,999999);
$nama_file_unik = $acak.$nama_file; 

if($password != $ulangiPassword){
    header('location:../../index.php?modul='.$modul.'&tipe=siswa&stat=notmatch');
}
else{

      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/jpg"){
          header('location:../../media.php?module='.$module.'&stat=failed');
      }
      else{

          UploadImage($nama_file_unik,$tipe);
          if($tipe=='siswa'){
              mysql_query("INSERT INTO `user`(`username`,`password`,`level`,`status`)
                                      VALUES('$username','$password','$tipe','Y')");
              mysql_query("INSERT INTO `siswa`(`nis`,`nama`,`kelas`,`jurusan`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`)
                                        VALUES('$nis','$nama','$kelas','$jurusan','$tempat','$tanggal_lahir','$alamat','$telepon','$email','$nama_file_unik','$username')");
              //echo"$username $password $tipe<br/>";
              //echo"$nis $nama $kelas $jurusan $tempat $tanggal_lahir $alamat $telepon $email $foto";
          }
          elseif($tipe == 'guru'){
              mysql_query("INSERT INTO `user`(`username`,`password`,`level`,`status`)
                                        VALUES('$username','$password','$tipe','N')");
              mysql_query("INSERT INTO `guru`(`nip`,`nama`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`)
                                        VALUES('$nip','$nama','$tempat','$tanggal_lahir','$alamat','$telepon','$email','$nama_file_unik','$username')");
          }
          header('location:../../index.php?stat=added');
      }
}

?>

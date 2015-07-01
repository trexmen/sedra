<?php

include "../../config/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$ulangiPassword = md5($_POST['ulangi_password']);

$nip = $_POST['nip'];

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas =  $_POST['kelas'];
$jurusan = "";
$tempat = "";
$tanggal_lahir = "";
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$foto= "";


$tipe=$_POST['tipe'];
$modul = 'reg';

if($password != $ulangiPassword){
    header('location:../../index.php?modul='.$modul.'&tipe=siswa&stat=notmatch');
}
else{

    if($tipe=='siswa'){
        mysql_query("INSERT INTO `user`(`username`,`password`,`level`,`status`)
                                VALUES('$username','$password','$tipe','Y')");
        mysql_query("INSERT INTO `siswa`(`nis`,`nama`,`kelas`,`jurusan`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`)
                                  VALUES('$nis','$nama','$kelas','$jurusan','$tempat','$tanggal_lahir','$alamat','$telepon','$email','$foto','$username')");
        //echo"$username $password $tipe<br/>";
        //echo"$nis $nama $kelas $jurusan $tempat $tanggal_lahir $alamat $telepon $email $foto";
    }
    elseif($tipe == 'guru'){
        mysql_query("INSERT INTO `user`(`username`,`password`,`level`,`status`)
                                  VALUES('$username','$password','$tipe','N')");
        mysql_query("INSERT INTO `guru`(`nip`,`nama`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`)
                                  VALUES('$nip','$nama','$tempat','$tanggal_lahir','$alamat','$telepon','$email','$foto','$username')");
    }
    header('location:../../index.php?stat=added');
}

?>

<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/fungsi-thumb.php";

$modul=$_GET['modul'];
$act=$_GET['act'];

// Hapus download
if ($modul=='guru-masuk-kelas' AND $act=='hapus'){
  mysql_query("DELETE FROM download WHERE id_download='$_GET[id]'");
  header('location:../../index.php?modul='.$modul);
}

// Input download
elseif ($modul=='guru-masuk-kelas' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../index.php?modul=$modul')</script>";
  }
  else{
    UploadFile($nama_file);
    mysql_query("INSERT INTO `materi`(`id_materi`,`judul_materi`,`deskripsi`,`file`,`id_sko`) 
                              VALUES(NULL,'$_POST[judul_materi]','$_POST[deskripsi]','$nama_file','$_POST[id_sko]')");
    header('location:../../index.php?modul='.$modul.'&nip='.$_POST['nip'].'&id_sko='.$_POST['id_sko']);
  }
  }
  else{
    mysql_query("INSERT INTO `materi`(`id_materi`,`judul_materi`,`deskripsi`,`id_sko`) 
                              VALUES(NULL,'$_POST[judul_materi]','$_POST[deskripsi]','$_POST[id_sko]')");
  header('location:../../index.php?modul='.$modul);
  }
}

// Update donwload
elseif ($modul=='guru-masuk-kelas' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila file tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE download SET judul     = '$_POST[judul]'
                             WHERE id_download = '$_POST[id]'");
  header('location:../../index.php?modul='.$modul);
  }
  else{
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../index.php?modul=$modul')</script>";
  }
  else{
    UploadFile($nama_file);
    mysql_query("UPDATE download SET judul     = '$_POST[judul]',
                                   nama_file    = '$nama_file'   
                             WHERE id_download = '$_POST[id]'");
  header('location:../../index.php?modul='.$modul);
  }
  }
}
}
?>

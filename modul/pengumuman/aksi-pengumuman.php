<?php

include "../../config/koneksi.php";
include "../../config/fungsi-thumb.php";

$id_pengumuman = $_POST['id_pengumuman'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$image = $_POST['image']!="default.jpg"? $_POST['image'] : "";

$modul = $_GET['modul'];
$act = $_GET['act'];

$lokasi_file    = $_FILES['fupload']['tmp_name'];
$tipe_file      = $_FILES['fupload']['type'];
$nama_file      = $_FILES['fupload']['name'];
$acak           = rand(000000,999999);
$nama_file_unik = $acak.$nama_file; 

if ($modul=='pengumuman' AND $act=='delete'){
      $data=mysql_fetch_array(mysql_query("SELECT `image` FROM `pengumuman` WHERE `id_pengumuman`='$_GET[id]'"));
      if ($data['image']!=''){
          mysql_query("DELETE FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
          DeleteImage($data['image'],$modul);
      }
      else{
          mysql_query("DELETE FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
      }   
      header('location:../../index.php?modul='.$modul.'&stat=deleted');
}
elseif($modul=='pengumuman' AND $act=='input'){

      if (empty($lokasi_file)){          
          mysql_query("INSERT INTO `pengumuman`(`id_pengumuman`,`judul`,`deskripsi`) VALUES(NULL,'$judul ','$deskripsi')");
          header('location:../../index.php?modul='.$modul.'&stat=added');
      }
      else{          
          if($tipe_file != "image/jpeg" AND $tipe_file != "image/jpg"){
              header('location:../../index.php?modul='.$modul.'&stat=failed');
          }
          else{
              UploadImage($nama_file_unik,$modul);
              mysql_query("INSERT INTO `pengumuman`(`id_pengumuman`,`judul`,`deskripsi`,`image`) VALUES(NULL,'$judul ','$deskripsi','$nama_file_unik')");   
              header('location:../../index.php?modul='.$modul.'&stat=added');
          }          
      }
}
elseif($modul=='pengumuman' AND $act=='edit'){

      if (empty($lokasi_file)){          
          mysql_query("UPDATE `pengumuman` SET `judul`='$judul',`deskripsi`='$deskripsi' WHERE `id_pengumuman`='$id_pengumuman'");
          header('location:../../index.php?modul='.$modul.'&stat=updated');
      }
      else{          
          if($tipe_file != "image/jpeg" AND $tipe_file != "image/jpg"){
              header('location:../../index.php?modul='.$modul.'&stat=failed');
          }
          else{
              UploadImage($nama_file_unik,$modul);   
              DeleteImage($image,$modul);
              mysql_query("UPDATE `pengumuman` SET `judul`='$judul',`deskripsi`='$deskripsi',`image`='$nama_file_unik' WHERE `id_pengumuman`='$id_pengumuman'");
              header('location:../../index.php?modul='.$modul.'&stat=updated');
          }          
      }
}

?>

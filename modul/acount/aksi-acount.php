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

      $username = $_POST['username'];

      $cekPassword = mysql_query("SELECT password FROM user WHERE username='$username'");
      $r    = mysql_fetch_array($cekPassword);      

      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $telepon = $_POST['telepon'];
      $email = $_POST['email'];

      $modul=$_GET['modul'];
      $passMD5 = md5($_POST['password_lama']);
      $passLama = $r['password'];
      $password_baru = $_POST['password_baru'];
      $ulangi_password = $_POST['ulangi_password'];

      $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = rand(000000,999999);
      $nama_file_unik = $acak.$nama_file;

      if (empty($lokasi_file)){          
            if(empty($_POST['password_baru']))
            {
                mysql_query("UPDATE siswa SET nama = '$nama',
                                                 alamat = '$alamat',
                                                 telepon = '$telepon',
                                                 email = '$email'
                                                 WHERE username = '$username'");
                header('location:../../index.php?modul='.$modul.'&stat=updated');
                //echo "$nama $alamat $telepon $email $username";
            }
            else
            {
                if(($passLama != $passMD5) || ($password_baru != $ulangi_password)){
                    header('location:../../index.php?modul='.$modul.'&stat=notmatch');
                }
                else{

                    mysql_query("UPDATE siswa SET nama = '$nama',
                                             alamat = '$alamat',
                                             telepon = '$telepon',
                                             email = '$email'
                                             WHERE username = '$username'");
                  
                    mysql_query("UPDATE user SET password  = MD5('$password_baru')
                                                 WHERE username = '$username'");
                    header('location:../../index.php?modul='.$modul.'&stat=updated');
                }
            }
      }
      else{          
          if($tipe_file != "image/jpeg" AND $tipe_file != "image/jpg"){
              header('location:../../index.php?modul='.$modul.'&stat=failed');
          }
          else{
              $foto=mysql_fetch_array(mysql_query("SELECT `foto` FROM `siswa` WHERE `username`='$username'"));
              UploadImage($nama_file_unik,"siswa");
              DeleteImage($foto['foto'],"siswa");
              if(empty($_POST['password_baru']))
              {
                  mysql_query("UPDATE siswa SET nama = '$nama',
                                                   alamat = '$alamat',
                                                   telepon = '$telepon',
                                                   email = '$email',
                                                   foto = '$nama_file_unik'
                                                   WHERE username = '$username'");
                  header('location:../../index.php?modul='.$modul.'&stat=updated');
                  //echo "$nama $alamat $telepon $email $username";
              }
              else
              {
                  if(($passLama != $passMD5) || ($password_baru != $ulangi_password)){
                      header('location:../../index.php?modul='.$modul.'&stat=notmatch');
                  }
                  else{

                      mysql_query("UPDATE siswa SET nama = '$nama',
                                               alamat = '$alamat',
                                               telepon = '$telepon',
                                               email = '$email',
                                               foto = '$nama_file_unik'
                                               WHERE username = '$username'");
                    
                      mysql_query("UPDATE user SET password  = MD5('$password_baru')
                                                   WHERE username = '$username'");
                      header('location:../../index.php?modul='.$modul.'&stat=updated');
                  }
              }
          }          
      }

}
?>

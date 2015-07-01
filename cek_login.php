<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  //header('location:index.php');
  echo"$username , $pass";
}
else{

$login=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$pass' AND status='Y'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  //include "timeout.php";

  $_SESSION['KCFINDER']=array();
  $_SESSION['KCFINDER']['disabled'] = false;
  $_SESSION['KCFINDER']['uploadURL'] = "../tinymcpuk/gambar";
  $_SESSION['KCFINDER']['uploadDir'] = "";

  $_SESSION['username']     = $r['username'];
  $_SESSION['level']        = $r['level'];
  $_SESSION['lockscreen']   = "off";

  
  // session timeout
  //timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE user SET id_session='$sid_baru' WHERE username='$username'");
  if(!isset($_POST['modul'])){
      if($_SESSION['level']=='admin'){
          $r=mysql_fetch_array(mysql_query("SELECT `nama` FROM `admin` WHERE `username`='".$username."'"));
          $_SESSION['nama']         = $r['nama'];
          header('location:index.php?modul=aktifasi-guru');
      }
      elseif($_SESSION['level']=='guru'){
          $r=mysql_fetch_array(mysql_query("SELECT `nama` FROM `guru` WHERE `username`='".$username."'"));
          $_SESSION['nama']         = $r['nama'];
          header('location:index.php?modul=ruang-guru');
      }
      elseif($_SESSION['level']=='siswa'){
          $r=mysql_fetch_array(mysql_query("SELECT `nama` FROM `siswa` WHERE `username`='".$username."'"));
          $_SESSION['nama']         = $r['nama'];
          header('location:index.php?modul=beranda');
      }
  }
  else{
     header('location:index.php?modul='.$_POST['modul']);
  }
}
else{
  header('location:index.php');
}
}


// SELECT u.username,u.`level`
// FROM `user` u
// WHERE u.username = (SELECT s.username FROM siswa s WHERE s.`username`='tarkiman') OR 
//       u.username = (SELECT g.username FROM guru g WHERE g.`username`='tarkiman') OR
//       u.username = (SELECT a.username FROM admin a WHERE a.`username`= 'tarkiman') 

?>


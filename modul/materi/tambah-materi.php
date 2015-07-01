<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/materi/aksi-materi.php";
switch($_GET[act]){
  default:
  	echo "
	<div style='width:765px;padding-bottom:5px;'>
		<div class='header_box'>
			<h2>Tambah Materi Baru</h2>
		</div>
		<form method='post' action='$aksi?modul=guru-masuk-kelas&act=input' style='padding:15px' enctype='multipart/form-data'>
			<input type='hidden' name='id_sko' value='$_GET[id_sko]'>
			<input type='hidden' name='nip' value='$_GET[nip]'>
			<table>
			<tbody>
			<tr>
				<td>
					<b>Judul Materi</b>
				</td>
				<td>:</td>
				<td>
					<input type='text' name='judul_materi' style='width:250px' type='text' class='cariInput' placeholder='Judul Materi' required>
				</td>
			</tr>
			<tr>
				<td valign='top'>
					<b>Deskiripsi</b>
				</td>
				<td valign='top'>:</td>
				<td>
					<textarea name='deskripsi' rows='10' cols='50' required></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<b>Upload File</b>
				</td>
				<td>:</td>
				<td>
					<input type='file' name='fupload' required>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<input type='submit' class='inputsubmit' value='Tambah Materi ini...'></td>
			</tr>
			</tbody>
			</table>
		</form>
	</div>";    
     break;
    
  case "editdownload":
    $edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Download</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?modul=download&act=update>
          <input type=hidden name=id value=$r[id_download]>
          <table class='list'><tbody>
          <tr><td class='left'>Judul</td><td class='left'>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td class='left'>File</td><td class='left'>    : $r[nama_file]</td></tr>
          <tr><td class='left'>Ganti File</td><td class='left'> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td class='left'colspan=2>*) Apabila file tidak diubah, dikosongkan saja.</td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    break;  
}
}
?>


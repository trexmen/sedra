<?php
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
    $aksi="modul/acount/aksi-acount-admin.php";

        $edit = mysql_query("SELECT * FROM user WHERE username='".$_SESSION['username']."'");
        $r = mysql_fetch_array($edit);

        echo "
	<div style='width:765px;padding-bottom:5px;'>
		<div class='header_box' style='color:white;'>
			<h2>Ubah Data dan Password</h2>
			 Username : <b>".$_SESSION['username']."</b>, Tipe User: <b>".$_SESSION['level']."</b>
		</div>";
		//====Pesan Validasi========
            if(!isset($_GET[stat]))
            {
              echo"<div></div>";
            }
            elseif($_GET[stat]=='added')
            {
              echo"<div class='alert alert-success alert-dismissable'>
                Data baru berhasil di tambahkan
                </div>";
            }
            elseif($_GET[stat]=='updated')
            {
              echo"<div class='alert alert-success alert-dismissable'>
                Data berhasil diubah
                </div>";
            }
            elseif($_GET[stat]=='notmatch')
            {
            echo"<div class='alert alert-danger alert-dismissable'>
                 Maaf, data gagal diupdate
                </div>";
            }
            elseif($_GET[stat]=='failed')
            {
            echo"<div class='alert alert-danger alert-dismissable'>
                 Maaf, Data ini tidak bisa dihapus karena sudah berelasi dengan data lainnya
                </div>";
            }
            elseif($_GET[stat]=='deleted')
            {
              echo"<div class='alert alert-success alert-dismissable'>
                Data berhasil di hapus
                </div>";
            }
            //==================
         echo"
		<form method='post' action='$aksi?modul=$_GET[modul]' style='padding:15px'>
			<input type='hidden' name='username' value='$r[username]'>
			<table>
			<tbody>			
			<tr>
				<td colspan='3'>
					<br>
					<h3>Ubah Password</h3>
					<b>Catatan:</b> Biarkan ketiga password di bawah ini kosong bila tidak akan mengubah password dengan password yang baru.
				</td>
			</tr>
			<tr>
				<td>
					<b>Password Lama</b>
				</td>
				<td>:</td>
				<td>
					<input name='password_lama' style='width:250px' type='password' class='cariInput'></td>
			</tr>
			<tr>
				<td>
					<b>Password Baru</b>
				</td>
				<td>:</td>
				<td>
					<input name='password_baru' style='width:250px' type='password' class='cariInput'>Maksimal 15 Karakter</td>
			</tr>
			<tr>
				<td>
					<b>Konsirmasi Password</b>
				</td>
				<td>:</td>
				<td>
					<input name='ulangi_password' style='width:250px' type='password' class='cariInput'>maksimal 15 Karakter</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<input type='submit' class='inputsubmit' value='Update Data ini...'></td>
			</tr>
			</tbody>
			</table>
		</form>
	</div>";
}
?>
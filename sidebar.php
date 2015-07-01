<?php
include "config/koneksi.php";
?>
<div style='width:200px'>
	<?php  
	if(!isset($_SESSION['level'])){ 
	echo"
  	<div style='border:1px solid #cccccc;padding:2px;margin-bottom:4px'>
		<div style='border-top:4px solid #999999;padding:5px;background:#444444;color:#ffffff;font-weight:bold;'>LOGIN</div>
		<div style='padding:4px;background:#f8f8f8'>
			<form onsubmit='return LoginCheck(this)' method='post' action='cek_login.php'>
				<table style='width:100%' cellpadding='0' cellspacing='2'>
				<tbody>
				<tr>
					<td width='100%'>Username:</td>
					<td>
						<input type='text' id='username' class='cariInput' name='username' style='width:100px' placeholder='username' onfocus='if (this.value==&#39;username&#39;) this.value=&#39;&#39;;'></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type='password' id='password' class='cariInput' name='password' style='width:100px' placeholder='password' onfocus='if (this.value==&#39;password&#39;) this.value=&#39;&#39;;'></td>
				</tr>
				<tr>
					<td colspan='2'>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input class='inputsubmit' type='submit' name='login' value='Login'></td>
				</tr>
				</tbody>
				</table><!--
				<div style='text-align:center;padding:5px;margin-top:5px;border:1px solid #ccc;background:#fff;font-size:11px'>
					<a href='https://login.unikom.ac.id/?action=04k08601k00u0t605h36c19d1ny26l00t2kr0ef081bcx13701c02m01h03d1h202a2i129f2so36400u2so0w103aaaq2so03d02m02w05t06i02a2e023336c0650872vv08r02w0qr3a102w07x03d0050mr03o3a129f26k13d00536o19k02wcf81xe01k01y01o08600o01k2bj0bu0o336p0451xe11106g2v93a206g02k00k01y0hl0141xe07p08o05504w2e00o801k3iv0yx08508608807x13g01h08o1ik2so0tf02m2bj11o0020om1ny01h00500201a1fc05h36c0db2i12wt0192so17g03d6y21fx00207505b0050nt02a2so2760ku2660190yx'></a>
				</div>-->
			</form>
		</div>
	</div>
	<div style='border:1px solid #cccccc;padding:2px;margin-bottom:4px'>
		<div style='border-top:4px solid #999999;padding:5px;background:#444444;color:#ffffff;font-weight:bold;'>DAFTAR</div>
		<div style='padding:4px;background:#f8f8f8'>
			Pilih tipe account, lalu klik daftar untuk melakukan pendaftaran.<br>
			<br>
			<div style='text-align:center'>
				<select class='cariInput' id='tipe_acount' name='tipe'>
					<option value='siswa'>SISWA</option>
					<option value='guru'>GURU</option>
				</select>
				<b><input type='button' class='inputsubmit' onclick='location=&#39;?modul=reg&amp;tipe=&#39;+getID(&#39;tipe_acount&#39;).value;' value='Daftar'></b>
			</div>
			&nbsp;
		</div>
	</div>	
	";

	}
  	elseif ($_SESSION['level']=='siswa'){ 
  	$r = mysql_fetch_array(mysql_query("SELECT * FROM siswa JOIN user USING(username) WHERE username='".$_SESSION['username']."'"));
  	echo"
	<div style='border:1px solid #cccccc;padding:2px;margin-bottom:4px'>
		<div style='border-top:4px solid #999999;padding:5px;background:#444444;color:#ffffff;font-weight:bold;'>".$r['nama']."</div>
		<div style='padding:4px;background:#f8f8f8'>
			<div style='border-bottom:1px solid #cccccc;padding-bottom:5px'>		
				<div style='text-align:center'>
					<img src='foto_siswa/".$r['foto']."' width='100' height='100' alt='' style='padding:1px;border:1px solid #aaaaaa'>
				</div>
			</div>
			<div class='box_menu_kiri'>
				<a href='?modul=beranda'>Beranda</a>
				<a href='?modul=kelas-baru'>Ambil Kelas Baru</a>
				<a href='?modul=acount'>Ubah Data &amp; Password</a>
				<a href=\"logout.php\" onClick=\"return confirm('Yakin akan keluar dari system ?')\" style='border-bottom:none'><b>Log Out</b></a>
			</div>
		</div>
	</div>

  		";
  	}
  	elseif ($_SESSION['level']=='guru'){ 
  	$r = mysql_fetch_array(mysql_query("SELECT * FROM guru JOIN user USING(username) WHERE username='".$_SESSION['username']."'"));
  	echo"
  	<div style='border:1px solid #cccccc;padding:2px;margin-bottom:4px'>
		<div style='border-top:4px solid #999999;padding:5px;background:#444444;color:#ffffff;font-weight:bold;'>".$r['nama']."</div>
		<div style='padding:4px;background:#f8f8f8'>
			<div style='border-bottom:1px solid #cccccc;padding-bottom:5px'>
				<div style='text-align:center'>
					<img src='foto_guru/".$r['foto']."' width='100' height='100' alt='' style='padding:1px;border:1px solid #aaaaaa'>
				</div>
			</div>
			<div class='box_menu_kiri'>
				<a href='?modul=ruang-guru'>Ruang Guru</a>
				<a href='?modul=buat-kelas'>Buat Kelas Baru</a>
				<a href='?modul=acount'>Ubah Data & Password</a>
				<a href=\"logout.php\" onClick=\"return confirm('Yakin akan keluar dari system ?')\" style='border-bottom:none'><b>Log Out</b></a>
			</div>
		</div>
	</div>
  		";
  	}
  	elseif ($_SESSION['level']=='admin'){ 
  	$r = mysql_fetch_array(mysql_query("SELECT * FROM admin JOIN user USING(username) WHERE username='".$_SESSION['username']."'"));
  	echo"
  	<div style='border:1px solid #cccccc;padding:2px;margin-bottom:4px'>
		<div style='border-top:4px solid #999999;padding:5px;background:#444444;color:#ffffff;font-weight:bold;'>".$r['nama']."</div>
		<div style='padding:4px;background:#f8f8f8'>
			<div style='border-bottom:1px solid #cccccc;padding-bottom:5px'>
				<div style='text-align:center'>
					<img src='foto_guru/".$r['foto']."' width='100' height='100' alt='' style='padding:1px;border:1px solid #aaaaaa'>
				</div>
			</div>
			<div class='box_menu_kiri'>
				<a href='?modul=aktifasi-guru'>Aktifasi Guru</a>
				<a href='?modul=daftar-guru'>Daftar Guru</a>
				<a href='?modul=daftar-siswa'>Daftar Siswa</a>
				<a href='?modul=acount'>Ubah Data & Password</a>
				<a href=\"logout.php\" onClick=\"return confirm('Yakin akan keluar dari system ?')\" style='border-bottom:none'><b>Log Out</b></a>
			</div>
		</div>
	</div>
  		";
  	}   
  	?>
</div>

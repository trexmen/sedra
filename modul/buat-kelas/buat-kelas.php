<?php
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
    $aksi="modul/buat-kelas/aksi-buat-kelas.php";
    $edit = mysql_query("SELECT nip FROM guru JOIN user USING(username) WHERE username='".$_SESSION['username']."'");
    $r = mysql_fetch_array($edit);

        echo "
	<div style='width:765px;padding-bottom:5px;'>
		<div class='header_box'>
			<h2>Buat Kelas Baru</h2>
		</div>
		<form method='post' action='$aksi?modul=buat-kelas&act=input' style='padding:15px'>
			<input type='hidden' name='nip' value='$r[nip]'>
			<table>
			<tbody>
			<tr>
				<td>
					<b>Nama Kelas</b>
				</td>
				<td>:</td>
				<td>
					<input name='nama_kelas' style='width:250px' type='text' class='cariInput' placeholder='Nama Kelas' required></td>
			</tr>
			<tr>
				<td>
					<b>Mata Pelajaran</b>
				</td>
				<td>:</td>
				<td>
					<select class='form-control' id='id_mp' name='id_mp' required><option value='' selected>-- Pilih Kategori --</option>";
                    $tampil=mysql_query("SELECT * FROM mata_pelajaran ORDER BY nama_mp");
                    while($r=mysql_fetch_array($tampil))
                    {
                      echo "<option value=$r[id_mp]>$r[nama_mp]</option>";
                    }
                    echo"
                    </select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<input type='submit' class='inputsubmit' value='Buat Kelas ini...'></td>
			</tr>
			</tbody>
			</table>
		</form>
	</div>";
}
?>
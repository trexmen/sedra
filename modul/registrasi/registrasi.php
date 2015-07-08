<?php
$aksi="modul/registrasi/aksi-registrasi.php";
switch($_GET['tipe'])
{
  	default:
			echo"SISWA"; break;

  	case "guru":
  			echo "
			<div style='width:765px;padding-bottom:5px;'>
				<div class='header_box'>
					<h2>Form Pendaftaran Guru</h2>
				</div>
				<form method='post' action='$aksi?tipe=guru' style='padding:15px' enctype='multipart/form-data'>
					<input type='hidden' name='tipe' value='$_GET[tipe]'>
					<table>
					<tbody>
					<tr>
						<td>
							<b>Username*</b>
						</td>
						<td>:</td>
						<td>
							<input name='username' id='username' style='width:250px' type='text' class='cariInput' required></td>
					</tr>
					<tr>
						<td>
							<b>Password*</b>
						</td>
						<td>:</td>
						<td>
							<input name='password' id='password' style='width:250px' type='password' class='cariInput' required>
							</td>
					</tr>
					<tr>
						<td>
							<b>Ulangi Password*</b>
						</td>
						<td>:</td>
						<td>
							<input name='ulangi_password' style='width:250px' type='password' class='cariInput' required>
						</td>
					</tr>
					<tr>
						<td>
							<b>NIP*</b>
						</td>
						<td>:</td>
						<td>
							<input name='nip' id='nip' style='width:250px' type='text' class='cariInput' maxlength='19' required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Nama*</b>
						</td>
						<td>:</td>
						<td>
							<input name='nama' style='width:250px' type='text' class='cariInput' required></td>
					</tr>
					<tr>
						<td>
							<b>Tempat Tanggal Lahir</b>
						</td>
						<td>:</td>
						<td>
							<input name='tempat' style='width:150px' type='text' class='cariInput'>,<input name='tanggal_lahir' style='width:250px' type='date' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>Alamat</b>
						</td>
						<td>:</td>
						<td>
							<input name='alamat' style='width:350px' type='text' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>No Telepon/HP</b>
						</td>
						<td>:</td>
						<td>
							<input name='telepon' style='width:150px' type='text'  maxlength='12' class='cariInput'></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
							<b>Email</b>
						</td>
						<td>:</td>
						<td>
							<input name='email' style='width:250px' type='email' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>Foto</b>
						</td>
						<td>:</td>
						<td>
							<input name='fupload' style='width:250px' type='file' required>
						</td>
					</tr>					
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input type='submit' class='inputsubmit' value='Daftarkan'></td>
					</tr>
					* = Wajib diisi
					</tbody>
					</table>
				</form>
			</div>";
		 break;
  	case "siswa":
  			echo "
			<div style='width:765px;padding-bottom:5px;'>
				<div class='header_box'>
					<h2>Form Pendaftaran Siswa</h2>
				</div>
				<form method='post' action='$aksi?tipe=siswa' style='padding:15px' enctype='multipart/form-data'>
					<input type='hidden' name='tipe' value='$_GET[tipe]'>
					<table>
					<tbody>
					<tr>
						<td>
							<b>Username*</b>
						</td>
						<td>:</td>
						<td>
							<input name='username' id='username' style='width:250px' type='text' class='cariInputDigit' required></td>
					</tr>
					<tr>
						<td>
							<b>Password*</b>
						</td>
						<td>:</td>
						<td>
							<input name='password' style='width:250px' type='password' class='cariInput' required>
							</td>
					</tr>
					<tr>
						<td>
							<b>Ulangi Password*</b>
						</td>
						<td>:</td>
						<td>
							<input name='ulangi_password' style='width:250px' type='password' class='cariInput' required>
						</td>
					</tr>
					<tr>
						<td>
							<b>NIS*</b>
						</td>
						<td>:</td>
						<td>
							<input name='nis' id='nip' style='width:250px' type='text' class='cariInput' maxlength='9' required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Nama*</b>
						</td>
						<td>:</td>
						<td>
							<input name='nama' style='width:250px' type='text' class='cariInput' required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Tempat Tanggal Lahir</b>
						</td>
						<td>:</td>
						<td>
							<input name='tempat' style='width:150px' type='text' class='cariInput'>,<input name='tanggal_lahir' style='width:250px' type='date' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>Kelas</b>
						</td>
						<td>:</td>
						<td>
							<input name='kelas' style='width:250px' type='text' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>Alamat</b>
						</td>
						<td>:</td>
						<td>
							<input name='alamat' style='width:350px' type='text' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>No Telepon/HP</b>
						</td>
						<td>:</td>
						<td>
							<input name='telepon' style='width:150px' type='text' class='cariInput' maxlength='12'></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
							<b>Email</b>
						</td>
						<td>:</td>
						<td>
							<input name='email' style='width:250px' type='email' class='cariInput'></td>
					</tr>
					<tr>
						<td>
							<b>Foto</b>
						</td>
						<td>:</td>
						<td>
							<input name='fupload' style='width:250px' type='file' required>
						</td>
					</tr>					
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input type='submit' class='inputsubmit' value='Daftarkan'></td>
					</tr>
					* = Wajib diisi
					</tbody>
					</table>
				</form>
			</div>";
			break;

}

	echo "</div>";
?>


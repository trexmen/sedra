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
				<form method='post' action='$aksi?tipe=guru' style='padding:15px'>
					<input type='hidden' name='username' value='$r[username]'>
					<table>
					<tbody>
					<tr>
						<td>
							<b>Username</b>
						</td>
						<td>:</td>
						<td>
							<input name='username' style='width:250px' type='text' class='cariInput'></td>
					</tr>
					<tr>
						<td>
							<b>Password</b>
						</td>
						<td>:</td>
						<td>
							<input name='password' style='width:250px' type='password' class='cariInput'>
							</td>
					</tr>
					<tr>
						<td>
							<b>Ulangi Password</b>
						</td>
						<td>:</td>
						<td>
							<input name='ulangi_password' style='width:250px' type='password' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>Nama</b>
						</td>
						<td>:</td>
						<td>
							<input name='nama' style='width:250px' type='text' class='cariInput'></td>
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
							<input name='telepon' style='width:150px' type='text' class='cariInput'></td>
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
							<input name='email' style='width:250px' type='text' class='cariInput'></td>
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
				<form method='post' action='$aksi?tipe=siswa' style='padding:15px'>
					<input type='hidden' name='username' value='$r[username]'>
					<table>
					<tbody>
					<tr>
						<td>
							<b>Username</b>
						</td>
						<td>:</td>
						<td>
							<input name='username' style='width:250px' type='text' class='cariInput'></td>
					</tr>
					<tr>
						<td>
							<b>Password</b>
						</td>
						<td>:</td>
						<td>
							<input name='password' style='width:250px' type='password' class='cariInput'>
							</td>
					</tr>
					<tr>
						<td>
							<b>Ulangi Password</b>
						</td>
						<td>:</td>
						<td>
							<input name='ulangi_password' style='width:250px' type='password' class='cariInput'>
						</td>
					</tr>
					<tr>
						<td>
							<b>Nama</b>
						</td>
						<td>:</td>
						<td>
							<input name='nama' style='width:250px' type='text' class='cariInput'></td>
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
							<input name='telepon' style='width:150px' type='text' class='cariInput'></td>
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
							<input name='email' style='width:250px' type='text' class='cariInput'></td>
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
					</tbody>
					</table>
				</form>
			</div>";
			break;

}

	echo "</div>";
?>
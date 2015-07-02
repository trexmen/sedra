<?php
$aksi="modul/buat-kelas/aksi-buat-kelas.php";
switch($_GET['act'])
{
  default:

  $nip=mysql_fetch_array(mysql_query("SELECT `nip` FROM `guru` WHERE `username`='$_SESSION[username]'"));

//Menampiklan data pengumuman 1 bulan terakhir
  $query = mysql_query("SELECT pk.`id_pengumuman`,pk.`judul`,pk.`deskripsi`,pk.`id_sko`,pk.`date_created`,g.`nip`,g.`nama`,g.`foto`,sko.`nama_kelas`
						FROM `pengumuman_kelas` pk JOIN `sesi_kelas_online` sko USING(id_sko)
									   JOIN `guru` g USING(nip)
						WHERE g.`nip`='$nip[nip]' AND (pk.`date_created` BETWEEN SUBDATE(SYSDATE(),INTERVAL 14 MONTH) AND SYSDATE())
						GROUP BY pk.`id_pengumuman`
						ORDER BY pk.`date_created` DESC");

  echo"
<div style='width:765px;padding-bottom:5px;'>
	<div class='header_box'>
		<h2>RUANG GURU</h2>
	</div>
	<table width='100%' cellpadding='0' cellspacing='0'>
	<tbody>
	<tr>
		<td width='50%' valign='top'>
			<div class='box_list_menu'>
			<br/>
			<h3>Buat Pengumuman Baru</h3>
			<hr/>
			<form method='post' action='modul/pengumuman/aksi-pengumuman-kelas.php?modul=ruang-guru&act=input'>					
			<select class='form-control' id='id_sko' name='id_sko' required><option value='' selected>-- Pilih Kelas --</option>";
                    $tampil=mysql_query("SELECT `id_sko`,`nama_kelas` FROM
										`sesi_kelas_online`
										WHERE `nip`='$nip[nip]' ORDER BY `nama_kelas` ASC");
                    while($r=mysql_fetch_array($tampil))
                    {
                      echo "<option value=$r[id_sko]>$r[nama_kelas]</option>";
                    }
                    echo"
            </select>
			<br/><br/>
			<input type='text' name='judul' placeholder='Judul Pengumuman' required><br/><br/>	
				<textarea name='deskripsi' rows='10' cols='50' required>
				</textarea>
				<input type='submit' value='Buat Pengumuman'>
			</form>
			</div>
		</td>
		<td width='50%' valign='top'>
			<div style='height:350px;overflow:auto;border-left:1px solid #cccccc'>
				<div id='status_update_div' style='margin:auto;width:350px'>
					&nbsp;";

					while($r=mysql_fetch_array($query)){
					echo"
					<div class='boxStatus_item'>
						<div class='boxStatus_list'>
							<img src='foto_guru/$r[foto]'><a href='?modul=guru&act=detail&nip=".$r['nip']."'>".$r['nama']."</a><span>".$r['nama_kelas']." | ".format_tanggal_lengkap($r['date_created'])."</span>
							<p>
								".$r['deskripsi']."
							</p>
						</div>
						
					</div>";
					}
					echo"					
				</div>
			</div>
		</td>
	</tr>
	</tbody>
	</table>
	<div class='header_box'>
		<h3>KELAS PELAJARAN SAYA</h3>
	</div>";

	
	$tampil = mysql_query("SELECT sko.`id_sko`,sko.`nip`,sko.`nama_kelas`,mp.`id_mp`,mp.`nama_mp`,COUNT(m.`id_materi`) AS jumlah_materi
							FROM `sesi_kelas_online` sko JOIN `mata_pelajaran` mp USING(`id_mp`)
										     LEFT JOIN `materi` m USING(`id_sko`)
							WHERE nip='$nip[nip]'
							GROUP BY sko.`id_sko` ORDER BY sko.`nama_kelas` ASC");
	$no=0;    
    while($r=mysql_fetch_array($tampil))
    {
	    	$no++;
	    	//Query Menampilkan Jumlah Materi / Guru
	    	// $materi = mysql_query("SELECT g.`nama`,COUNT(m.`id_materi`) AS 'jumlah_materi'
						// 			FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
						// 				      JOIN materi m USING(id_sko)
						// 			WHERE g.`nip`='".$r['nip']."'
						// 			GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	// $m=mysql_fetch_array($materi);
	    	//$jumlah_materi = ($m['jumlah_materi']!="")? $m['jumlah_materi'] : 0;

	    	//Query Menampilkan Jumlah Siswa / Guru
	    	$siswa = mysql_query("SELECT g.`nama`,COUNT(k.`id_kelas`) AS 'jumlah_siswa'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										      JOIN kelas k USING(id_sko)
									WHERE g.`nip`='$r[nip]' AND sko.`id_sko`='$r[id_sko]' 
									GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	$s=mysql_fetch_array($siswa);
	    	$jumlah_siswa = ($s['jumlah_siswa']!="")? $s['jumlah_siswa'] : 0;

	    	/*Query Menampilkan Jumlah Sesuai Kelas yang diajarkan*/
		    $tampilPengumuman = mysql_query("SELECT pk.`id_pengumuman`,pk.`judul`,pk.`deskripsi`,pk.`id_sko`,pk.`date_created`,g.`nip`,g.`nama`,g.`foto`,sko.`nama_kelas`
									FROM `pengumuman_kelas` pk JOIN `sesi_kelas_online` sko USING(id_sko)
												   JOIN `guru` g USING(nip)
									WHERE g.`nip`='$nip[nip]' AND pk.`id_sko`='$r[id_sko]'
									GROUP BY pk.`id_pengumuman`
									ORDER BY pk.`date_created` DESC");
		    $np=mysql_num_rows($tampilPengumuman);

	      	echo "

		<div class='list_box'>
			<div class='kelas_title_box'>				
				<a class='tools' href=\"$aksi?modul=ruang-guru&act=hapus&id_sko=$r[id_sko]\" onClick=\"return confirm('Yakin akan menutup/menghapus kelas ini ?')\">Tutup Kelas Ini</a>".$no.". ".$r['nama_kelas']."
			</div>
			<div style='padding:10px;line-height:18px;font-size:12px;background:#f5f5f5'>
				<table width='100%' cellpadding='4' cellspacing='1'>
				<tbody>
				<tr>
					<td width='30%'>Nama Mata Pelajaran :</td>
					<td width='70%' colspan='3' style='background:#ffffff'>
						<b>".$r['nama_mp']."</b>
					</td>
				</tr>
				<tr>
					<td width='30%'>Jumlah Siswa pada Kelas ini :</td>
					<td width='70%' colspan='3' style='text-align:right;background:#ffffff'>
						<b>".$jumlah_siswa."</b>
					</td>
				</tr>
				<tr>
					<td width='30%'>Jumlah Materi :</td>
					<td width='20%' style='text-align:right;background:#ffffff'>
						<b style='color:#006600'>".$r['jumlah_materi']."</b>
					</td>
					<td width='30%'>Jumlah Pengumuman :</td>
					<td width='20%' style='text-align:right;background:#ffffff'>
						<b style='color:#006600'>".$np."</b>
					</td>
				</tr>
				</tbody>
				</table>
			</div>
			<div class='kelas_toolsbox'>
				<a class='tool_kelas' href='?modul=guru-masuk-kelas&nip=$nip[nip]&id_sko=$r[id_sko]'>Masuk Kelas</a>
				<a class='tool_mhs' href='?modul=list-siswa&nip=$nip[nip]&id_sko=$r[id_sko]'>Daftar Siswa</a>
				<div class='clearboth'>&nbsp;</div>
			</div>
		</div>
		";
	}
}
	echo"
</div>";

?>

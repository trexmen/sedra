<?php
$aksi="modul/masuk-kelas/aksi-masuk-kelas.php";
switch($_GET['act'])
{
  default:

		//Query Menampilkan Materi Sesuai Kelas yang diikuti
	    $tampil = mysql_query("SELECT sko.`nama_kelas`,mp.`nama_mp`,g.`nip`,g.`nama`,m.`judul_materi`,m.`deskripsi`,m.`file`,m.`date_created`
								FROM `materi` m RIGHT JOIN `sesi_kelas_online` sko USING(id_sko)
									      JOIN `kelas` k USING(id_sko)
									      JOIN `siswa` s USING(nis)
									      JOIN `guru` g USING(nip)
									      JOIN `mata_pelajaran` mp USING(id_mp)
								WHERE `nis`='$_GET[nis]' AND `id_sko`='$_GET[id_sko]'
								ORDER BY m.`date_created` DESC ");
	    //Query Menampilkan Materi Sesuai Kelas yang diikuti
	    $tampil1 = mysql_query("SELECT sko.`nama_kelas`,mp.`nama_mp`,g.`nip`,g.`nama`,m.`judul_materi`,m.`deskripsi`,m.`file`,m.`date_created`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
									      JOIN `kelas` k USING(id_sko)
									      JOIN `siswa` s USING(nis)
									      JOIN `guru` g USING(nip)
									      JOIN `mata_pelajaran` mp USING(id_mp)
								WHERE `nis`='$_GET[nis]' AND `id_sko`='$_GET[id_sko]'
								ORDER BY m.`date_created` DESC ");

	    $n=mysql_num_rows($tampil1);
	    $r=mysql_fetch_array($tampil);

	    /*Query Menampilkan Pengumuman Sesuai Kelas yang diajarkan*/
	    $tampilPengumuman = mysql_query("SELECT pk.`id_pengumuman`,pk.`judul`,pk.`deskripsi`,pk.`id_sko`,pk.`date_created`,g.`nip`,g.`nama`,g.`foto`,sko.`nama_kelas`
								FROM `pengumuman_kelas` pk JOIN `sesi_kelas_online` sko USING(id_sko)
											   JOIN `guru` g USING(nip)
								WHERE g.`nip`='".$r['nip']."' AND pk.`id_sko`='$_GET[id_sko]'
								GROUP BY pk.`id_pengumuman`
								ORDER BY pk.`date_created` DESC");
	    $np=mysql_num_rows($tampilPengumuman);
	echo"
	<div style='width:765px;padding-bottom:5px;'>
		<div class='header_box'>
			<a href='?modul=beranda' class='tools'>&lt; Kembali ke Beranda Siswa</a>
			<h2>KELAS: ".$r['nama_kelas']."</h2>
		</div>
		<div class='msg_box'>
			<table cellpadding='3'>
			<tbody>
			<tr>
				<td>Mata Pelajaran</td>
				<td>:</td>
				<td>
					<b>".$r['nama_mp']."</b>
				</td>
			</tr>
			<tr>
				<td>Guru</td>
				<td>:</td>
				<td>
					<b>".$r['nama']."</b>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		<div class='kelas_toolsbox'>
			<a class='tool_mhs' href='?modul=list-siswa&nis=".$_GET['nis']."&id_sko=".$_GET['id_sko']."'>Daftar Siswa</a>
			<div class='clearboth'>&nbsp;</div>
		</div>
	</div>
	<div class='header_box'>
		<a href='http://kuliahonline.unikom.ac.id/?kuliah/&kID=MzA3Ng%3D%3D#' onclick='if (this.innerHTML==&#39;Tampilkan&#39;){getID(&#39;content_pengumuman&#39;).style.display=&#39;&#39;; this.innerHTML=&#39;Sembunyikan&#39;;}else {getID(&#39;content_pengumuman&#39;).style.display=&#39;none&#39;;this.innerHTML=&#39;Tampilkan&#39;;}return false;' class='tools'>Tampilkan</a>
		<h3>[ <b style='color:#006600'>".$np."</b> ] PENGUMUMAN KELAS</h3>
	</div>
	<div style='border-left:45px solid #cccccc;padding-left:5px;display:none' id='content_pengumuman'>";
	while($p=mysql_fetch_array($tampilPengumuman))
	    {
  			$ukuran_file = ukuran_file($path_file);
	      	echo "
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>".$p['judul']."</div>
			<div style='padding:15px;background:#e5e5e5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>".format_tanggal_lengkap($p['date_created'])."</div>
				".$p['deskripsi']."
			</div>
		</div>
		";
		}
		echo"
	</div>	
	<div class='header_box'>
		<a href='http://kuliahonline.unikom.ac.id/?kuliah/&kID=MzA3Ng%3D%3D#' onclick='if (this.innerHTML==&#39;Tampilkan&#39;){getID(&#39;content_materi&#39;).style.display=&#39;&#39;; this.innerHTML=&#39;Sembunyikan&#39;;}else {getID(&#39;content_materi&#39;).style.display=&#39;none&#39;;this.innerHTML=&#39;Tampilkan&#39;;}return false;' class='tools'>Sembunyikan</a>
		<h3>[ <b style='color:#006600'>".$n."</b> ] MATERI PELAJARAN</h3>
	</div>
	<div style='border-left:45px solid #cccccc;padding-left:5px' id='content_materi'>

";
		//Query Menampilkan Materi Sesuai Kelas yang diikuti
	    $tampil = mysql_query("SELECT sko.`nama_kelas`,mp.`nama_mp`,g.`nama`,m.`judul_materi`,m.`deskripsi`,m.`file`,m.`date_created`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
									      JOIN `kelas` k USING(id_sko)
									      JOIN `siswa` s USING(nis)
									      JOIN `guru` g USING(nip)
									      JOIN `mata_pelajaran` mp USING(id_mp)
								WHERE `nis`='$_GET[nis]' AND `id_sko`='$_GET[id_sko]'
								ORDER BY m.`date_created` DESC ");
	
	    while($r=mysql_fetch_array($tampil))
	    {
	    	$path_file = "file_materi/".$r['file'];
  			$ukuran_file = ukuran_file($path_file);
	      	echo "
		<div class='list_box'>
			<div class='materi_title_box'>
				<a class='tools' href='file_materi/".$r['file']."' target='*' title='".$r['file']."'>Download File ( ".$ukuran_file." )</a>".$r['judul_materi']."&nbsp;
			</div>
			<div style='padding:15px;background:#e5e5e5'>
				".$r['deskripsi']."
				<div style='text-align:right;padding-top:10px'>
					Update : <b>".format_tanggal_lengkap($r['date_created'])."</b>
				</div>
			</div>
		</div>
		";
		}

		echo"
	</div>
	";
}
?>

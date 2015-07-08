<?php
$aksi="modul/materi/aksi-tambah-materi.php";
switch($_GET['act'])
{
  default:
  		/*menampilkan Nama Guru dan kelasnya*/
  		$pelajaran = mysql_query("SELECT sko.`nama_kelas`,mp.`nama_mp`,g.`nama`
										FROM `sesi_kelas_online` sko JOIN `guru` g USING(nip)
											      JOIN `mata_pelajaran` mp USING(id_mp)
										WHERE `nip`='$_GET[nip]' AND `id_sko`='$_GET[id_sko]'");
  		$p=mysql_fetch_array($pelajaran);

		/*Query Menampilkan Materi Sesuai Kelas yang diajarkan*/
	    $tampil = mysql_query("SELECT sko.`nama_kelas`,mp.`nama_mp`,g.`nama`,m.`judul_materi`,m.`deskripsi`,m.`file`,m.`date_created`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
									      JOIN `guru` g USING(nip)
									      JOIN `mata_pelajaran` mp USING(id_mp)
								WHERE `nip`='$_GET[nip]' AND `id_sko`='$_GET[id_sko]'
								ORDER BY m.`date_created` DESC ");
	    $n=mysql_num_rows($tampil);
	    $r=mysql_fetch_array($tampil);

	    /*Query Menampilkan Pengumuman Sesuai Kelas yang diajarkan*/
	    $tampilPengumuman = mysql_query("SELECT pk.`id_pengumuman`,pk.`judul`,pk.`deskripsi`,pk.`id_sko`,pk.`date_created`,g.`nip`,g.`nama`,g.`foto`,sko.`nama_kelas`
								FROM `pengumuman_kelas` pk JOIN `sesi_kelas_online` sko USING(id_sko)
											   JOIN `guru` g USING(nip)
								WHERE g.`nip`='$_GET[nip]' AND pk.`id_sko`='$_GET[id_sko]'
								GROUP BY pk.`id_pengumuman`
								ORDER BY pk.`date_created` DESC");
	    $np=mysql_num_rows($tampilPengumuman);
	echo"
	<div style='width:765px;padding-bottom:5px;'>
		<div class='header_box'>
			<a href='?modul=tambah-materi&nip=$_GET[nip]&id_sko=$_GET[id_sko]' class='tools'>Tambah Materi</a>
			<a href='?modul=ruang-guru' class='tools'>&lt; Kembali ke Ruang Guru</a>
			<h2>KELAS: ".$p['nama_kelas']."</h2>
		</div>
		<div class='msg_box'>
			<table cellpadding='3'>
			<tbody>
			<tr>
				<td>Mata Pelajaran</td>
				<td>:</td>
				<td>
					<b>".$p['nama_mp']."</b>
				</td>
			</tr>
			<tr>
				<td>Nama Guru</td>
				<td>:</td>
				<td>
					<b>".$p['nama']."</b>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		<div class='kelas_toolsbox'>
			<a class='tool_mhs' href='?modul=list-siswa&nip=".$_GET['nip']."&id_sko=".$_GET['id_sko']."'>Daftar Siswa</a>
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
	    $tampil = mysql_query("SELECT m.`id_materi`,sko.`nama_kelas`,mp.`nama_mp`,g.`nama`,m.`judul_materi`,m.`deskripsi`,m.`file`,m.`date_created`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
									      JOIN `guru` g USING(nip)
									      JOIN `mata_pelajaran` mp USING(id_mp)
								WHERE `nip`='$_GET[nip]' AND `id_sko`='$_GET[id_sko]'
								GROUP BY m.`id_materi`
								ORDER BY m.`date_created` DESC");
	
	    while($r=mysql_fetch_array($tampil))
	    {
	    	$path_file = "file_materi/".$r['file'];
  			$ukuran_file = ukuran_file($path_file);
	      	echo "
		<div class='list_box'>
			<div class='materi_title_box'>
				<a class='tools' href='modul/materi/aksi-materi.php?act=hapus&id=$r[id_materi]&modul=$_GET[modul]&nip=$_GET[nip]&id_sko=$_GET[id_sko]' >Hapus Materi</a>
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

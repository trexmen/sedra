<?php
$aksi="modul/masuk-kelas/aksi-masuk-kelas.php";
switch($_GET['act'])
{
  default:

		//Query Menampilkan Materi Sesuai Kelas yang diikuti
	    $tampil = mysql_query("SELECT sko.`nama_kelas`,mp.`nama_mp`,g.`nama`,m.`judul_materi`,m.`deskripsi`,m.`file`,m.`date_created`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
									      JOIN `kelas` k USING(id_sko)
									      JOIN `siswa` s USING(nis)
									      JOIN `guru` g USING(nip)
									      JOIN `mata_pelajaran` mp USING(id_mp)
								WHERE `nis`='$_GET[nis]' AND `id_sko`='$_GET[id_sko]'
								ORDER BY m.`date_created` DESC ");
	    $n=mysql_num_rows($tampil);
	    $r=mysql_fetch_array($tampil);
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
				<td>Dosen</td>
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
		<h3>[ <b style='color:#006600'>11</b> ] PENGUMUMAN</h3>
	</div>
	<div style='border-left:45px solid #cccccc;padding-left:5px;display:none' id='content_pengumuman'>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>TEORI MANAJEMEN RESIKO, GCG &amp; IT&nbsp;</div>
			<div style='padding:15px;background:#e5e5e5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>24-06-13 07:08:54</div>
				SILAHKAN BACA DI PERPUSTAKAAN BUKU WAJIB ENTREPRENEURSHIP REVISI. SELAMAT BELAJAR...
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>UAS&nbsp;</div>
			<div style='padding:15px;background:#f5f5f5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>22-06-13 11:42:59</div>
				UAS ENTREPRENEURSHIP DILAKSANAKAN PADA MINGGU KEDUA, TGL. 8, 10 &amp; 12 JULI 2013 SESUAI JADWAL KULIAH MASING-MASING.TOPIK : SEMUA MATERI SETELAH UTS.JUMLAH SOAL : 126, MULTIPLE CHOICE.SELAMAT BELAJAR...
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>KULIAH TERAKHIR&nbsp;</div>
			<div style='padding:15px;background:#e5e5e5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>22-06-13 11:36:12</div>
				KULIAH TERAKHIR ENTREPRENEURSHIP, TOPIK : IT, DILAKSANAKAN PADA TGL. 24, 26 &amp; 28 JUNI SESUAI JADWAL KULIAH MASING-MASING.SELAMAT MENGIKUTI KULIAH...
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>NILAI UTS&nbsp;</div>
			<div style='padding:15px;background:#f5f5f5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>18-06-13 11:48:23</div>
				SILAHKAN DOWNLOAD NILAI UTS ANDA DI MATERI KULIAH...
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>TUGAS-2 ENTREPRENEURSHIP&nbsp;</div>
			<div style='padding:15px;background:#e5e5e5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>10-06-13 12:25:03</div>
				TUGAS-2 ENTREPRENEURSHIP DAPAT DI DOWNLOAD DI MATERI KULIAH.BATAS WAKTU UPLOAD TUGAS-2 : SABTU, 6 JULI 2013.SELAMAT MENGERJAKAN TUGAS-2...
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>TUGAS-1&nbsp;</div>
			<div style='padding:15px;background:#f5f5f5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>09-04-13 16:36:20</div>
				SILAHKAN DOWNLOAD TUGAS-1 ENTREPRENEURSHIP.[ERHATIKAN BATAS WAKTU UPLOAD TUGAS-1 TSB.SELAMAT MENGERJAKAN TUGAS...
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>Materi Perluasan Kuliah-4&nbsp;</div>
			<div style='padding:15px;background:#e5e5e5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>09-04-13 16:21:41</div>
				Silahkan download materi perluasan kuliah-4.Selamat belajar...
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>QUIZ-2 &amp; MATERI PERLUASANKE-3&nbsp;</div>
			<div style='padding:15px;background:#f5f5f5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>21-03-13 23:15:31</div>
				<p>
					QUIZ-2 MELIPUTI BAB-3 &amp; BAB-4 AKAN DILAKUKAN PADA KULIAH-4 DARI TANGGAL 25 MARET S/D 5 APRIL 2013.
				</p>
				<p>
					SILAHKAN DOWNLOAD PERLUASAN KULIAH KE-3.
				</p>
				<p>
					SELAMAT BELAJAR...
				</p>
			</div>
		</div>
		<div class='list_box'>
			<div class='pengumuman_title_box' style='background-color:#006600'>QUIZ-1&nbsp;</div>
			<div style='padding:15px;background:#e5e5e5'>
				<div style='border-bottom:1px dashed #666666;padding-bottom:5px;margin-bottom:8px;text-align:right;color:#558855'>15-03-13 07:02:54</div>
				<p>
					QUIZ-1 AKAN DIADAKAN PADA TGL. 18 HINGGA 22 MARET 2013.
				</p>
				<p>
					TOPIK QUIZ : BAB-1 &amp; BAB-2
				</p>
				<p>
					SELAMAT BELAJAR...
				</p>
			</div>
		</div>
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

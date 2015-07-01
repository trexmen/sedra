<?php
$aksi="modul/guru/aksi-guru.php";
switch($_GET['act'])
{
  default:
echo"
					<div style='width:765px;padding-bottom:5px;'>
						<div class='header_box'>
							<a class='tools' href='?modul=kelas'>Semua Kelas</a>
							<a class='tools' href='?modul=beranda'>Kembali ke Beranda</a>
							<h2>Ambil Kelas Baru</h2>
						</div>
						<div class='msg_box'>
							 Masukan nama guru pada <b>Cari Nama Guru</b> untuk menyaring daftar guru di bawah, kemudian klik <b>Pilih Guru Ini</b> untuk memilih kelas pada guru yang akan Anda ikuti.
						</div>
						<div style='margin:10px;'>
							<div style='border:1px solid #cccccc;background:#eeeeee;border-bottom:none'>
								<table cellpadding='8' width='100%'>
								<tbody>
								<tr>
									<td>Cari Nama Guru :</td>
									<td align='right'>
										<input type='text' style='width:500px' id='dosen_inputFilter' name='filter' size='90'></td>
								</tr>
								</tbody>
								</table>
							</div>
							<div style='height:380px;overflow:auto;border:1px solid #cccccc' id='dosen_list_view'>
								<table cellpadding='7' cellspacing='1' style='width:100%;background:#cccccc' id='jsondata'>
								<tbody>

";
	if (empty($_GET['kata']))
	{
		//Query Menampilkan Jumlah Kelas / Guru
	    $tampil = mysql_query("SELECT g.`nip`,g.`nama`,g.`foto`,COUNT(sko.`nip`) AS 'jumlah_kelas'
								FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
											  JOIN `user` u USING(username)
								WHERE u.`status`='Y'
								GROUP BY g.`nip` ORDER BY g.`nama` ASC ");    
	    while($r=mysql_fetch_array($tampil))
	    {
	    	//Query Menampilkan Jumlah Materi / Guru
	    	$materi = mysql_query("SELECT g.`nama`,COUNT(m.`id_materi`) AS 'jumlah_materi'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										      JOIN materi m USING(id_sko)
										      JOIN `user` u USING(username)
									WHERE g.`nip`='".$r['nip']."' AND u.`status`='Y'
									GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	$m=mysql_fetch_array($materi);
	    	$jumlah_materi = ($m['jumlah_materi']!="")? $m['jumlah_materi'] : 0;

	    	//Query Menampilkan Jumlah Siswa / Guru
	    	$siswa = mysql_query("SELECT g.`nama`,COUNT(k.`id_kelas`) AS 'jumlah_siswa'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										      JOIN kelas k USING(id_sko)
										      JOIN `user` u USING(username)
									WHERE g.`nip`='".$r['nip']."' AND u.`status`='Y'
									GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	$s=mysql_fetch_array($siswa);
	    	$jumlah_siswa = ($s['jumlah_siswa']!="")? $s['jumlah_siswa'] : 0;

	      	echo "
								<tr style='background: rgb(255, 255, 255);' onmouseover='this.style.background=&#39;#ffffdd&#39;;' onmouseout='this.style.background=&#39;#ffffff&#39;;'>
									<td>
										<img src='foto_guru/".$r['foto']."' style='border:1px solid #cccccc;padding:1px;background:#ffffff' width='100' height='100' alt=''>
									</td>
									<td width='100%'>
										<table style='width:100%' cellpadding='4' cellspacing='1'>
										<tbody>
										<tr>
											<td>
												<b style='font-size:14px'>".$r['nama']."</b>
											</td>
											<td align='right'>
											";
												if($r['jumlah_kelas']==0){
													echo"<em style='color:#888888'>Tidak ada kelas..</em>";
												}else{
													echo"<a href='?modul=pilih-kelas&nip=".$r['nip']."' class='inputsubmit'>Pilih Guru Ini</a>";
												}										
												
												echo"
											</td>
										</tr>
										<tr>
											<td width='75%' style='background:#f5f5f5'>Jumlah Kelas :</td>
											<td align='right' style='background:#eeeeee'>
												<b>".$r['jumlah_kelas']."</b>
											</td>
										</tr>
										<tr>
											<td width='75%' style='background:#f5f5f5'>Jumlah Materi :</td>
											<td align='right' style='background:#eeeeee'>
												<b>".$jumlah_materi."</b>
											</td>
										</tr>
										<tr>
											<td width='75%' style='background:#f5f5f5'>Jumlah Mahasiswa yang diajar :</td>
											<td align='right' style='background:#eeeeee'>
												<b>".$jumlah_siswa."</b>
											</td>
										</tr>
										</tbody>
										</table>
									</td>
								</tr>
								";
	    }
        echo "</tbody>
		</table>



		";
		break;
	}
	else
  	{
  		//Query Menampilkan Jumlah Kelas / Guru
	    $tampil = mysql_query("SELECT g.`nip`,g.`nama`,g.`foto`,COUNT(sko.`nip`) AS 'jumlah_kelas'
								FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
											  JOIN `user` u USING(username)								
								WHERE `nama` LIKE '%$_GET[kata]%' AND u.`status`='Y'
								GROUP BY g.`nip` ORDER BY g.`nama` ASC ");    
	    while($r=mysql_fetch_array($tampil))
	    {
	    	//Query Menampilkan Jumlah Materi / Guru
	    	$materi = mysql_query("SELECT g.`nama`,COUNT(m.`id_materi`) AS 'jumlah_materi'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										      JOIN materi m USING(id_sko)
										      JOIN `user` u USING(username)	
									WHERE g.`nip`='".$r['nip']."' AND u.`status`='Y'
									GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	$m=mysql_fetch_array($materi);
	    	$jumlah_materi = ($m['jumlah_materi']!="")? $m['jumlah_materi'] : 0;

	    	//Query Menampilkan Jumlah Siswa / Guru
	    	$siswa = mysql_query("SELECT g.`nama`,COUNT(k.`id_kelas`) AS 'jumlah_siswa'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										      JOIN kelas k USING(id_sko)
										      JOIN `user` u USING(username)	
									WHERE g.`nip`='".$r['nip']."' AND u.`status`='Y'
									GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	$s=mysql_fetch_array($siswa);
	    	$jumlah_siswa = ($s['jumlah_siswa']!="")? $s['jumlah_siswa'] : 0;

	      	echo "
								<tr style='background: rgb(255, 255, 255);' onmouseover='this.style.background=&#39;#ffffdd&#39;;' onmouseout='this.style.background=&#39;#ffffff&#39;;'>
									<td>
										<img src='foto_guru/".$r['foto']."' style='border:1px solid #cccccc;padding:1px;background:#ffffff' width='100' height='100' alt=''>
									</td>
									<td width='100%'>
										<table style='width:100%' cellpadding='4' cellspacing='1'>
										<tbody>
										<tr>
											<td>
												<b style='font-size:14px'>".$r['nama']."</b>
											</td>
											<td align='right'>
											";
												if($r['jumlah_kelas']==0){
													echo"<em style='color:#888888'>Tidak ada kelas..</em>";
												}else{
													echo"<a href='?modul=pilih-kelas&nip=".$r['nip']."' class='inputsubmit'>Pilih Guru Ini</a>";
												}										
												
												echo"
											</td>
										</tr>
										<tr>
											<td width='75%' style='background:#f5f5f5'>Jumlah Kelas :</td>
											<td align='right' style='background:#eeeeee'>
												<b>".$r['jumlah_kelas']."</b>
											</td>
										</tr>
										<tr>
											<td width='75%' style='background:#f5f5f5'>Jumlah Materi :</td>
											<td align='right' style='background:#eeeeee'>
												<b>".$jumlah_materi."</b>
											</td>
										</tr>
										<tr>
											<td width='75%' style='background:#f5f5f5'>Jumlah Mahasiswa yang diajar :</td>
											<td align='right' style='background:#eeeeee'>
												<b>".$jumlah_siswa."</b>
											</td>
										</tr>
										</tbody>
										</table>
									</td>
								</tr>
								";
	    }
        echo "</tbody>
		</table>";
		break;		
  	}
		echo"
							</div>
							<div style='border:1px solid #cccccc;background:#eeeeee;border-bottom:none;text-align:right;padding:2px;'>
								 Expand Tampilan : <input type='button' value='+' onclick='if (this.value==&#39;+&#39;){ this.value=&#39;-&#39;; getID(&#39;dosen_list_view&#39;).style.height=&#39;&#39;; getID(&#39;dosen_list_view&#39;).style.overflow=&#39;&#39;; }else{ this.value=&#39;+&#39;; getID(&#39;dosen_list_view&#39;).style.height=&#39;380px&#39;; getID(&#39;dosen_list_view&#39;).style.overflow=&#39;auto&#39;; }'></div>
						</div>						
					</div>

";

}
?>


<?php
$aksi="modul/pilih-kelas/aksi-pilih-kelas.php";
switch($_GET['act'])
{
  default:
	echo"

					<div style='width:765px;padding-bottom:5px;'>
						<div class='header_box'>
							<a class='tools' href='?modul=pilih-kelas'>Semua Kelas</a><a class='tools' href='?modul=kelas-baru'>Kembali ke List Dosen</a>
							<a class='tools' href='?modul=beranda'>Kembali ke Beranda</a>
							<h2>Ambil Kelas Baru</h2>
						</div>
						<div class='msg_box'>
							 Masukan nama kelas, matakuliah atau dosen pada <b>Cari Kelas</b> untuk menyaring daftar kelas di bawah, kemudian klik <b>Ambil Kelas Ini</b> untuk mengambil dan memulai perkuliahan pada kelas yang dimaksud.
						</div>
						<div style='margin:10px;'>
							<div style='border:1px solid #cccccc;background:#eeeeee;border-bottom:none'>
								<table cellpadding='8' width='100%'>
								<tbody>
								<tr>
									<td>Cari Kelas :</td>
									<td align='right'>
										<input type='text' id='dosen_inputFilter' style='width:500px' name='filter' size='90' onkeyup='this.value=this.value.toUpperCase();refresh_kelaslist(this.value.toUpperCase());'></td>
								</tr>
								</tbody>
								</table>
							</div>
							<div style='height:380px;overflow:auto;border:1px solid #cccccc' id='dosen_list_view'>
								<table cellpadding='7' cellspacing='1' style='width:100%;background:#cccccc'>
								<tbody>


";
	if (empty($_GET['kata']))
	{
		//Query Menampilkan Daftar Kelas
	    $tampil = mysql_query("SELECT g.`nip`,g.`nama`,sko.`id_sko`,sko.`nama_kelas`,mp.`id_mp`,mp.`nama_mp`
								FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										JOIN `mata_pelajaran` mp USING(id_mp)
								WHERE g.`nip`='".$_GET['nip']."' ORDER BY g.`nama` ASC ");

		$nis=mysql_fetch_array(mysql_query("SELECT `nis` FROM `siswa` WHERE `username`='$_SESSION[username]'"));
	    while($r=mysql_fetch_array($tampil))
	    {
	    	//Query Menampilkan Jumlah Materi / Kelas
	    	$materi = mysql_query("SELECT g.`nama`,sko.`nama_kelas`,mp.`nama_mp`,COUNT(m.`judul_materi`) AS 'jumlah_materi'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
											JOIN `mata_pelajaran` mp USING(id_mp)
											JOIN `materi` m USING(`id_sko`)
									WHERE g.`nip`='".$r['nip']."' AND mp.`id_mp`=".$r['id_mp']." ORDER BY mp.`nama_mp` ASC");
	    	$m=mysql_fetch_array($materi);
	    	$jumlah_materi = ($m['jumlah_materi']!="")? $m['jumlah_materi'] : 0;

			//Cek sudah diambil apa belum
			$ketemu=mysql_num_rows(mysql_query("SELECT * FROM `kelas` k JOIN `sesi_kelas_online` sko USING(id_sko) WHERE `id_sko`='$r[id_sko]' AND `nis`='$nis[nis]'"));

	      	echo "
								<tr style='background: rgb(255, 255, 221);' onmouseover='this.style.background=&#39;#ffffdd&#39;;' onmouseout='this.style.background=&#39;#ffffff&#39;;'>
									<td width='100%'>
										<table style='width:100%' cellpadding='4' cellspacing='1'>
										<tbody>
										<tr>
											<td colspan='2' width='100%'>
												<span style='font-size:16px'>KELAS :</span><b style='font-size:16px'>".$r['nama_kelas']."</b>
											</td>
											<td align='right'>";
												if($ketemu>0){
													echo"<em style='color:#888888'>Sudah di ambil..</em>";
												}else{
													echo"<a href='".$aksi."?modul=pilih-kelas&act=input&id_sko=".$r['id_sko']."&nis=".$nis['nis']."' class='inputsubmit'>Ambil Kelas Ini</a>";
												}										
												
												echo"
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nama Matakuliah :</td>
											<td width='70%' colspan='2' style='background:#eeeeee'>
												<b>".$r['nama_mp']."</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nama Dosen :</td>
											<td colspan='2' style='background:#eeeeee'>
												<b>".$r['nama']."</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Jumlah Materi :</td>
											<td colspan='2' style='background:#eeeeee'>
												<b>".$jumlah_materi."</b>
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
	else
  	{
  		//Query Menampilkan Jumlah Kelas / Guru
	    $tampil = mysql_query("SELECT g.`nip`,g.`nama`,g.`foto`,COUNT(sko.`nip`) AS 'jumlah_kelas'
								FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
								WHERE `nama` LIKE '%$_GET[kata]%'
								GROUP BY g.`nip` ORDER BY g.`nama` ASC ");    
	    while($r=mysql_fetch_array($tampil))
	    {
	    	//Query Menampilkan Jumlah Materi / Guru
	    	$materi = mysql_query("SELECT g.`nama`,COUNT(m.`id_materi`) AS 'jumlah_materi'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										      JOIN materi m USING(id_sko)
									WHERE g.`nip`='".$r['nip']."'
									GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	$m=mysql_fetch_array($materi);
	    	$jumlah_materi = ($m['jumlah_materi']!="")? $m['jumlah_materi'] : 0;

	    	//Query Menampilkan Jumlah Siswa / Guru
	    	$siswa = mysql_query("SELECT g.`nama`,COUNT(k.`id_kelas`) AS 'jumlah_siswa'
									FROM `guru` g LEFT JOIN `sesi_kelas_online` sko USING(nip)
										      JOIN kelas k USING(id_sko)
									WHERE g.`nip`='".$r['nip']."'
									GROUP BY g.`nip` ORDER BY g.`nama` ASC");
	    	$s=mysql_fetch_array($siswa);
	    	$jumlah_siswa = ($s['jumlah_siswa']!="")? $s['jumlah_siswa'] : 0;

	      	echo "
								<tr style='background: rgb(255, 255, 255);' onmouseover='this.style.background=&#39;#ffffdd&#39;;' onmouseout='this.style.background=&#39;#ffffff&#39;;'>
									<td width='100%'>
										<table style='width:100%' cellpadding='4' cellspacing='1'>
										<tbody>
										<tr>
											<td colspan='2' width='100%'>
												<span style='font-size:16px'>KELAS :</span><b style='font-size:16px'>MANAJEMEN DATA MSI 2013</b>
											</td>
											<td align='right'>
												<input onclick='location=&#39;./?go/kelas/&amp;submitKelas=3635&#39;;' class='inputsubmit' type='button' value='Ambil Kelas Ini'>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nama Matakuliah :</td>
											<td width='70%' colspan='2' style='background:#eeeeee'>
												<b>MANAJEMEN DATA</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nama Dosen :</td>
											<td colspan='2' style='background:#eeeeee'>
												<b>ADAM MUKHARIL BACHTIAR</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Jumlah Materi :</td>
											<td colspan='2' style='background:#eeeeee'>
												<b>2</b>
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
						<script type='text/javascript'>
var listD=new Array();
listD[0]=new Array('RPL 2 2015','REKAYASA PERANGKAT LUNAK 2 2015','ADAM MUKHARIL BACHTIAR','4337',8,0);listD[1]=new Array('MANAJEMEN DATA MSI 2013','MANAJEMEN DATA','ADAM MUKHARIL BACHTIAR','3635',2,0);listD[2]=new Array('RPL I IF 2013','REKAYASA PERANGKAT LUNAK I','ADAM MUKHARIL BACHTIAR','3611',5,0);listD[3]=new Array('RPL II IF 2013','REKAYASA PERANGKAT LUNAK II','ADAM MUKHARIL BACHTIAR','3190',5,0);listD[4]=new Array('ALGORITMA DAN PEMROGRAMAN IF 2012','ALGORITMA DAN PEMROGRAMAN','ADAM MUKHARIL BACHTIAR','2768',10,0);listD[5]=new Array('RPL I IF 2012','REKAYASA PERANGKAT LUNAK I','ADAM MUKHARIL BACHTIAR','2767',11,0);listD[6]=new Array('ANALISIS ALGORITMA IF 2012','ANALISIS ALGORITMA','ADAM MUKHARIL BACHTIAR','2766',6,0);listD[7]=new Array('STRUKTUR DATA IF-2012','STRUKTUR DATA','ADAM MUKHARIL BACHTIAR','2472',21,0);listD[8]=new Array('PBO IF-2012','PEMROGRAMAN BERORIENTASI OBJEK','ADAM MUKHARIL BACHTIAR','2344',12,110);listD[9]=new Array('RPL IF-2012','REKAYASA PERANGKAT LUNAK','ADAM MUKHARIL BACHTIAR','2343',15,1004);listD[10]=new Array('ALGORITMA DAN PEMROGRAMAN 2011','ALGORITMA DAN PEMROGRAMAN 2011','ADAM MUKHARIL BACHTIAR','2021',11,0);listD[11]=new Array('METODOLOGI PENELITIAN 2011','METODOLOGI PENELITIAN','ADAM MUKHARIL BACHTIAR','2020',9,879);listD[12]=new Array('ANALISIS ALGORITMA 2011','ANALISIS ALGORITMA','ADAM MUKHARIL BACHTIAR','2019',14,526);listD[13]=new Array('RPL IF-2011','REKAYASA PERANGKAT LUNAK','ADAM MUKHARIL BACHTIAR','1654',16,1283);listD[14]=new Array('PBO IF-2011','PEMROGRAMAN BERORIENTASI OBJEK','ADAM MUKHARIL BACHTIAR','1653',11,1450);listD[15]=new Array('PEMROGRAMAN I IF-2010','PEMROGRAMAN DAN PRAKTIKUM PEMROGRAMAN I','ADAM MUKHARIL BACHTIAR','1271',18,1376);listD[16]=new Array('ALGORITMA IF-2010','ALGORITMA DAN PEMROGRAMAN I','ADAM MUKHARIL BACHTIAR','1270',9,0);listD[17]=new Array('PROGRAMMING TEAM IF-2010','TIM PROGRAMMING IF-2010','ADAM MUKHARIL BACHTIAR','530',11,0);listD[18]=new Array('STRUKDAT IF-2010','STRUKTUR DATA','ADAM MUKHARIL BACHTIAR','435',14,0);listD[19]=new Array('PBO IF-2010','PEMROGRAMAN BERBASIS OBJEK','ADAM MUKHARIL BACHTIAR','431',13,0);listD[20]=new Array('KOMDAT IF-2010','KOMUNIKASI DATA','ADAM MUKHARIL BACHTIAR','430',8,0);function refresh_kelaslist(filter){
	var tmp_listD;
	if (filter){
		tmp_listD=new Array();
		var k = 0;
		for (var i=0;i<listD.length;i++){
			for (var j=0;j<3;j++){
				var src_list=' '+listD[i][j];
				if (src_list.indexOf(' '+filter)>=0){
					tmp_listD[k]=listD[i];
					k++;
					break;
				}
			}
		}
	}
	else{
		tmp_listD=listD;
	}
	if (tmp_listD.length>0){
		var iHtml = '<table cellpadding='7' cellspacing='1' style='width:100%;background:#cccccc'>';
		for (var i=0;i<tmp_listD.length;i++){
			iHtml += '<tr style='background:#ffffff' onmouseover='this.style.background=\'#ffffdd\';' onmouseout='this.style.background=\'#ffffff\';'>';
			iHtml += '<td width='100%'>';
			var txthtml = new Array();
			for (var j=0;j<3;j++){
				txthtml[j] = tmp_listD[i][j];
				if (filter){
					txthtml[j] = ' '+tmp_listD[i][j];
					txthtml[j] = txthtml[j].replace(' '+filter,' <span style='background:#555500;color:#ffffff'>'+filter+'</span>');
					txthtml[j] = txthtml[j].substring(1);
				}
			}
			iHtml += '<table style='width:100%' cellpadding='4' cellspacing='1'>';
			iHtml += '<tr><td colspan='2' width='100%'><span style='font-size:16px'>KELAS :</span><b style='font-size:16px'>'+(txthtml[0])+'</b></td>';
			if (tmp_listD[i][5]==0)
				iHtml += '<td align='right'><input onclick='location=\'./?go/kelas/&amp;submitKelas='+(tmp_listD[i][3])+'\';' class='inputsubmit' type='button' value='Ambil Kelas Ini' /></td></tr>';
			else
				iHtml += '<td align='right'><em style='color:#888888'>Sudah di ambil..</em></td>';
			iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Nama Matakuliah :</td><td width='70%' colspan='2' style='background:#eeeeee'><b>'+(txthtml[1])+'</b></td></tr>';
			iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Nama Dosen :</td><td colspan='2' style='background:#eeeeee'><b>'+(txthtml[2])+'</b></td></tr>';
			iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Jumlah Materi :</td><td colspan='2' style='background:#eeeeee'><b>'+(tmp_listD[i][4])+'</b></td></tr>';
			iHtml += '</table>';
			iHtml += '</td>';
			iHtml += '</tr>';
		}	
		iHtml += '</table>';
	}
	else{
		var iHtml = '<div style='padding:10px;font-size:12px;font-style:italic;color:#888888;text-align:center'>Kelas yang Anda maksud tidak ditemukan...</div>';
	}
	getID('dosen_list_view').innerHTML=iHtml;
}
refresh_kelaslist();
getID('dosen_inputFilter').focus();
						</script>
					</div>
";

}
?>

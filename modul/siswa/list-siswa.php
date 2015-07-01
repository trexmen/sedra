<?php
$aksi="modul/guru/aksi-guru.php";
switch($_GET['act'])
{
  default:

  $tampil = mysql_query("SELECT s.`nis`,UPPER(s.`nama`) AS 'nama',s.`username`,s.`kelas`,s.`jurusan`,s.`email`,sko.`id_sko`,sko.`nama_kelas`,s.`foto`
								FROM `kelas` k JOIN `sesi_kelas_online` sko USING(id_sko)
								     JOIN `siswa` s USING(nis)
								WHERE sko.`id_sko`='".$_GET['id_sko']."' ORDER BY s.`nama` ASC ");
  $t = mysql_fetch_array($tampil);
echo"
					<div style='width:765px;padding-bottom:5px;'>
						<div class='header_box'>
							<a class='tools' href='?modul=masuk-kelas&nis=".$_GET['nis']."&id_sko=".$_GET['id_sko']."'>Kembali Ke Kelas</a><a class='tools' href='?modul=beranda'>Kembali Ke Beranda</a>
							<h3>Daftar Siswa - Kelas : ".$t['nama_kelas']."</h3>
						</div>
						<div class='msg_box'>
							 Masukan nama atau NIS Siswa pada <b>Cari Siswa</b> untuk menyaring daftar siswa di bawah.
						</div>
						<div style='margin:10px;'>
							<div style='border:1px solid #cccccc;background:#eeeeee;border-bottom:none'>
								<table cellpadding='8' width='100%'>
								<tbody>
								<tr>
									<td>Cari Siswa :</td>
									<td align='right'>
										<input type='text' style='width:500px' id='dosen_inputFilter' name='filter' size='90' onkeyup='this.value=this.value.toUpperCase();refresh_mhslist(this.value.toUpperCase());'></td>
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
		
		$no=0;    
	    while($r=mysql_fetch_array($tampil))
	    {
	    	$no++;
	      	echo "
								<tr style='background: rgb(255, 255, 255);' onmouseover='this.style.background=&#39;#ffffdd&#39;;' onmouseout='this.style.background=&#39;#ffffff&#39;;'>
									<td valign='top' align='center'>
										<img src='foto_siswa/".$r['foto']."' style='border:1px solid #cccccc;padding:1px;background:#ffffff' width='100' height='100' alt=''><br>
										<input type='button' class='inputsubmit' onclick='location=&#39;./?home/&amp;mahasiswa=kontak&amp;COMPOSED=kontak&amp;tFOR=1&amp;idFOR=kuyachan&#39;' value='Kirim Pesan'>
									</td>
									<td width='100%' valign='top'>
										<div class='mhs_title_box' style='margin:0'>".$no.". ".$r['nama']."</div>
										<table style='width:100%' cellpadding='4' cellspacing='1'>
										<tbody>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nim :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>".$r['nis']."</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nama :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>".$r['nama']."</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Username :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>".$r['username']."</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Jurusan :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>".$r['jurusan']."</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Kelas :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>".$r['nama_kelas']."</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Email :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>".$r['email']."</b>
											</td>
										</tr>
										</tbody>
										</table>
									</td>
								</tr>";
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
									<td valign='top' align='center'>
										<img src='foto_siswa/saved_resource(2)' style='border:1px solid #cccccc;padding:1px;background:#ffffff' width='100' height='100' alt=''><br>
										<input type='button' class='inputsubmit' onclick='location=&#39;./?home/&amp;mahasiswa=kontak&amp;COMPOSED=kontak&amp;tFOR=1&amp;idFOR=scoundrel&#39;' value='Kirim Pesan'>
									</td>
									<td width='100%' valign='top'>
										<div class='mhs_title_box' style='margin:0'>2. ARIEF DODI</div>
										<table style='width:100%' cellpadding='4' cellspacing='1'>
										<tbody>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nim :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>10110920</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Nama :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>ARIEF DODI</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Username :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>SCOUNDREL</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Fakultas :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>Teknik</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Jurusan :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>Teknik Informatika</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Kelas :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>if-17k</b>
											</td>
										</tr>
										<tr>
											<td width='30%' style='background:#f5f5f5'>Email :</td>
											<td width='70%' style='background:#eeeeee'>
												<b>rief_7474@yahoo.co.id</b>
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
listD[0]=new Array('KUYACHAN','NIKA TRIE B','10110946','Teknik','Teknik Informatika','if-17k','vincentvanhell@gmail.com','','LIST',1);listD[1]=new Array('SCOUNDREL','ARIEF DODI','10110920','Teknik','Teknik Informatika','if-17k','rief_7474@yahoo.co.id','http://','LIST',2);listD[2]=new Array('FRANS_REYNOLD','FRANS REYNOLD','10110954','Teknik','Teknik Informatika','IF17K','abankmino@yahoo.co.id','http://','LIST',3);listD[3]=new Array('WHIZ','WISNU SISWANTOKO','1011919,','Teknik','Teknik Informatika','IF-17K','badthegonk_whiz@yahoo.co.id','http://wisnusiswantoko.com','LIST',4);listD[4]=new Array('SETIADIBUDI','BUDI SETIADI','10110952','Teknik','Teknik Informatika','IF 17K','maistiadi@yahoo.co.id','http://www.facebook.com/setiadi.budi','LIST',5);listD[5]=new Array('DEKO','DEDI KOHAR','10110918','Teknik','Teknik Informatika','17 K','dedi_razor@yahoo.com','dedideko.wordpress.com','LIST',6);listD[6]=new Array('KURDIANTO','KURDIANTO','1011958,','Teknik','Teknik Informatika','IF-17K','kurd14nt0@yahoo.com','http://kurdianto.web.id','LIST',7);listD[7]=new Array('KURDIANTO','KURDIANTO','1011958,','Teknik','Teknik Informatika','IF-17K','kurd14nt0@yahoo.com','http://kurdianto.web.id','LIST',8);listD[8]=new Array('IBAYMUSTOFA','MUHAMAD IQBAL M','10110949','Teknik','Teknik Informatika','IF-17K','ibaymustofa@yahoo.com','http://','LIST',9);listD[9]=new Array('BUTONGFAY','SUWARDANA CAHYA BUDIMAN','10110953','Teknik','Teknik Informatika','IF-17K/S1/I','scbudiman@gmail.com','http://','LIST',10);listD[10]=new Array('REVHY','REVI NURUL ALAM','10110673 ','Teknik','Teknik Informatika','IF-17/K','revi.nurulalam@gmail.com','http://','LIST',11);listD[11]=new Array('RUSM4N','MUHAMMAD RUSMAN','10110955','Teknik','Teknik Informatika','IF-17K','rus_mancio@yahoo.com','http://','LIST',12);listD[12]=new Array('TOZZZ','MUZI_DESPRIAWAN','10107902','Teknik','Teknik Informatika','IF-17K','muzidespriawan@yahoo.com','http://','LIST',13);listD[13]=new Array('TOZZZ','MUZI_DESPRIAWAN','10107902','Teknik','Teknik Informatika','IF-17K','muzidespriawan@yahoo.com','http://','LIST',14);listD[14]=new Array('RACKIET','RIAN ANDRIYANTO','43090449','Desain &amp; Seni','Desain Komunikasi Visual','1','rian_arjun3105@yahoo.com','http://rian-sejahtera.blogspot.com','LIST',15);listD[15]=new Array('RACKIET','RIAN ANDRIYANTO','43090449','Desain &amp; Seni','Desain Komunikasi Visual','1','rian_arjun3105@yahoo.com','http://rian-sejahtera.blogspot.com','LIST',16);listD[16]=new Array('','','','','','','','','LIST',17);listD[17]=new Array('TREXMEN','Trexmen','10110738','Teknik','Teknik Informatika','IF-16','Trexmen.zone@gmail.com','http://','LIST',18);listD[18]=new Array('DENDINOPIANDIYUSUF','DENDI NOPIANDI','10110098','Teknik','Teknik Informatika','IF3','Dendy_yusuf@yahoo.co.id','http://','LIST',19);listD[19]=new Array('HARRY_PERMADI','HARRY PERMADI SURANTO','10111430','Teknik','Teknik Informatika','IF-10','hry.permadi@gmail.com','http://','LIST',20);listD[20]=new Array('ARIANGGARA','MUHAMMAD ARI ANGGARA','10111641','Teknik','Teknik Informatika','IF-14','muh.ari.anggara@gmail.com','http://muhammadarianggara.blogspot.com/','LIST',21);listD[21]=new Array('EMOEL47','SAEPUDIN MULYONO','10111912','Teknik','Teknik Informatika','17K','saepudinmulyono@gmail.com','http://istanahijab.com','LIST',22);listD[22]=new Array('ILO_SLALU','ILHAM RAHMAT','11081180','Teknik','Manajemen Informatika','mi35','ilo.illank40@gmail.com','http://','LIST',23);listD[23]=new Array('DADAN_SETIADI','DADAN_SETIADI','10110733','Teknik','Teknik Informatika','if_16','dadan_setiadi@ymail.com','http://','LIST',24);listD[24]=new Array('','','','','','','','','LIST',25);listD[25]=new Array('','','','','','','','','LIST',26);listD[26]=new Array('DIDINSYAIFUDDIN','DIDIN SYAIFUDDIN','17011983','Teknik','Teknik Informatika','IF','nurdin_83@yahoo.com','http://','LIST',27);listD[27]=new Array('10109999','YOGA LIMKA','10109999','Teknik','Teknik Informatika','IF17K','ikhwanmulia@gmail.com','http://','LIST',28);listD[28]=new Array('BRITTACOM','SARASTO NIRBOYO','22092013','Teknik','Teknik Komputer','malam','brittacom@yahoo.com','http://','LIST',29);listD[29]=new Array('TRIX','KIKI D','5710111060','Teknik','Sistem Informasi (S2)','MSI-1 BU','master.trix@yahoo.com','http://aptoxin.blogspot.com','LIST',30);listD[30]=new Array('EXXECUTIONER','IMAM MUSLIM','10110724','Teknik','Teknik Informatika','IF-16','imamoes@rocketmail.com','facebook.com/imammoeslim','LIST',31);listD[31]=new Array('ERICKISO','ERICK IRAWAN SUGIANTO OEOEN','10110732','Teknik','Teknik Informatika','16','rhiec@ymail.com','http://erickiso.blogspot.com','LIST',32);function refresh_mhslist(filter){
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
			iHtml += '<td valign='top' align='center'>';
			iHtml += '<img src='./?go/pic/&amp;mahasiswa='+(tmp_listD[i][0]).toLowerCase()+'' style='border:1px solid #cccccc;padding:1px;background:#ffffff' width='100' height='100' alt='' /><br />';
			iHtml += '<input type='button' class='inputsubmit' onclick='location=\'./?home/&mahasiswa=kontak&COMPOSED=kontak&tFOR=1&idFOR='+(tmp_listD[i][0]).toLowerCase()+'\'' value='Kirim Pesan' />';
			iHtml += '</td>';
			iHtml += '<td width='100%' valign='top'>';
			var nama_lengkap = tmp_listD[i][1];
			var txthtml = new Array();
			for (var j=0;j<3;j++){
				txthtml[j] = tmp_listD[i][j];
				if (filter){
					txthtml[j] = ' '+tmp_listD[i][j];
					txthtml[j] = txthtml[j].replace(' '+filter,' <span style='background:#555500;color:#ffffff'>'+filter+'</span>');
					txthtml[j] = txthtml[j].substring(1);
				}
			}
			iHtml += '<div class='mhs_title_box' style='margin:0'>'+(tmp_listD[i][9])+'. '+(txthtml[1])+'</div>';
			iHtml += '<table style='width:100%' cellpadding='4' cellspacing='1'>';
			iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Nim :</td><td width='70%' style='background:#eeeeee'><b>'+(txthtml[2])+'</b></td></tr>';
			iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Nama :</td><td width='70%' style='background:#eeeeee'><b>'+(txthtml[1])+'</b></td></tr>';
			iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Username :</td><td width='70%' style='background:#eeeeee'><b>'+(txthtml[0])+'</b></td></tr>';
			if (tmp_listD[i][8]=='LIST'){
				iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Fakultas :</td><td width='70%' style='background:#eeeeee'><b>'+(tmp_listD[i][3])+'</b></td></tr>';
				iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Jurusan :</td><td width='70%' style='background:#eeeeee'><b>'+(tmp_listD[i][4])+'</b></td></tr>';
				iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Kelas :</td><td width='70%' style='background:#eeeeee'><b>'+(tmp_listD[i][5])+'</b></td></tr>';
				if (tmp_listD[i][6]!='')
				iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Email :</td><td width='70%' style='background:#eeeeee'><b>'+(tmp_listD[i][6])+'</b></td></tr>';
				if ((tmp_listD[i][7]!='')&&(tmp_listD[i][7]!='http://'))
					iHtml += '<tr><td width='30%' style='background:#f5f5f5'>Website :</td><td width='70%' style='background:#eeeeee'><b>'+(tmp_listD[i][7])+'</b></td></tr>';
				iHtml += '</table>';
			}
			else{
				iHtml += '</table>';
				if (tmp_listD[i][8]==0){
					iHtml +='<div class='warning_box'>Tidak ada tugas yang telah di upload oleh mahasiswa ini...</div>';
				}
				else{
					iHtml +='<table cellpadding='4' cellspacing='1' style='background:#cccccc;width:100%;border-top:4px solid #006600'>';
					iHtml +='<tr style='background:#444444;color:#ffffff;font-weight:bold;text-align:center'>';
					iHtml +='<th width='5%'>No</th>';
					iHtml +='<th width='25%'>Tgl Upload</th>';
					iHtml +='<th width='30%'>Judul</th>';
					iHtml +='<th width='30%'>Nama File</th>';
					iHtml +='<th align='center' width='10%'>Nilai</th>';
					iHtml +='<th>Download</th>';
					iHtml +='</tr>';
					for (var t=0;t<tmp_listD[i][8].length-1;t++){
						var row=tmp_listD[i][8][t];
						iHtml += '<tr style='background:#ffffff'>';
						iHtml += '<td align='right'>'+(t+1)+'.</td>';
						iHtml += '<td align='center'>'+(row[0])+'</td>';
						iHtml += '<td>'+(row[1])+'</td>';
						iHtml += '<td>'+(row[2])+'</td>';
						iHtml += '<td><input type='text' onchange='updatenilaitugas('+(row[3])+',this);' value=''+(row[4]?row[4]:'')+'' size='5' style='text-align:right' onfocus='this.select()' /></td>';
						iHtml += '<td><input type='button' class='inputsubmit' value='Download' onclick='location=\'./?go/kuliah/&amp;getTugasFile='+(row[3])+'\';' /></td>';
						iHtml += '</tr>';
					}
					iHtml += '</table>';
				}
			}
			iHtml += '</td>';
			iHtml += '</tr>';
		}	
		iHtml += '</table>';
	}
	else{
		var iHtml = '<div style='padding:10px;font-size:12px;font-style:italic;color:#888888;text-align:center'>Mahasiswa yang Anda maksud tidak ditemukan...</div>';
	}
	getID('dosen_list_view').innerHTML=iHtml;
}
refresh_mhslist();
getID('dosen_inputFilter').focus();
						</script>
					</div>
";

}
?>
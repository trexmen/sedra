<?php
$aksi="modul/materi/aksi-materi.php";
switch($_GET['act'])
{
  default:
echo"
<div style='width:765px;padding-bottom:5px;'>
	<div class='header_box'>
		<a class='tools' href='index.php'>Kembali</a>
		<h2>Daftar Materi Pelajaran</h2>
	</div>
	<script type='text/javascript'>function kk(uname){ location='./?kontak/&amp;COMPOSED=kontak&amp;tFOR=1&amp;idFOR='+uname; }</script>
	<table style='width:100%;border-bottom:1px solid #888888;background:#eeffee' cellspacing='0' cellpadding='4'>
	<tbody>
	<form method=get action='$_SERVER[PHP_SELF]'>
	<input type='hidden' name='modul' value='materi'>
	<tr>
		<td width='100%' align='right'>
			<b>Cari Materi Pelajaran :</b>
		</td>
		<td>
			<input value='' type='text' name='kata' id='tc_nama' size='60' class='inputbox' placeholder='Masukkan Keyword Pencarian'></td>
		<td>
			<input type='submit' value='Cari' class='inputsubmit'>
		</td>
	</tr>
	</form>

	</tbody>
	</table>

";
	if (empty($_GET['kata']))
	{
		echo"
		<table style='width:100%' cellpadding='5' cellspacing='1'>
		<tbody>
		<tr style='background:#000000;color:#ffffff;font-weight:bold'>
			<td width='5%'>No</td>
			<td width='20%'>Tanggal</td>
			<td width='30%'>Judul Materi</td>
			<td width='20%'>Nama Guru</td>
			<td width='25%'>Mata Pelajaran</td>
		</tr>
		";

	    $p      = new Paging;
	    $batas  = 20;
	    $posisi = $p->cariPosisi($batas);

	    $tampil = mysql_query("SELECT m.`id_materi`,m.`date_created`,m.`judul_materi`,g.`nip`,g.`nama`,sko.`nama_kelas`,mp.`nama_mp`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
								JOIN `guru` g USING(nip)
								JOIN mata_pelajaran mp USING(id_mp) ORDER BY m.`date_created` ASC LIMIT $posisi,$batas");
	    

	    $no = $posisi+1;	    
	    while($r=mysql_fetch_array($tampil))
	    {
	    	$warna = ($no % 2) == 0 ? "background:#eeeeee" : "background:#ffffff";
	      	echo "

			<tr style='$warna'>
				<td>".$no."</td>
				<td>".format_tanggal_lengkap($r['date_created'])."</td>
				<td><a href='?modul=materi&act=detail&id_materi=$r[id_materi]'>".$r['judul_materi']."</a></td>
				<td><a href='?modul=guru&act=detail&nip=$r[nip]'>".$r['nama']."</a></td>
				<td>".$r['nama_mp']."</td>
			</tr>
			";
	          $no++;
	    }
        echo "</tbody>
		</table>";
        $jmldata = mysql_num_rows(mysql_query("SELECT m.`id_materi`,m.`date_created`,m.`judul_materi`,g.`nip`,g.`nama`,sko.`nama_kelas`,mp.`nama_mp`
												FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
												JOIN `guru` g USING(nip)
												JOIN mata_pelajaran mp USING(id_mp)"));
         
        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

        echo "<div id='paging_page' ><b>Halaman:</b><br>$linkHalaman</div>";   
        break;    
  	}
 	else
  	{
  		echo"
		<table style='width:100%' cellpadding='5' cellspacing='1'>
		<tbody>
		<tr style='background:#000000;color:#ffffff;font-weight:bold'>
			<td width='5%'>No</td>
			<td width='20%'>Tanggal</td>
			<td width='30%'>Judul Materi</td>
			<td width='20%'>Nama Guru</td>
			<td width='25%'>Mata Pelajaran</td>
		</tr>
		";

	    $p      = new Paging;
	    $batas  = 20;
	    $posisi = $p->cariPosisi($batas);

	    $tampil = mysql_query("SELECT m.`id_materi`,m.`date_created`,m.`judul_materi`,g.`nip`,g.`nama`,sko.`nama_kelas`,mp.`nama_mp`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
								JOIN `guru` g USING(nip)
								JOIN mata_pelajaran mp USING(id_mp) WHERE m.`judul_materi` LIKE '%$_GET[kata]%' OR g.`nama` LIKE '%$_GET[kata]%' OR mp.`nama_mp` LIKE '%$_GET[kata]%' ORDER BY m.`date_created` DESC LIMIT $posisi,$batas");
	    

	    $no = $posisi+1;
	    while($r=mysql_fetch_array($tampil))
	    {
	      	$warna = ($no % 2) == 0 ? "background:#eeeeee" : "background:#ffffff";
	      	echo "

			<tr style='$warna'>
				<tr style='$warna'>
				<td>".$no."</td>
				<td>".format_tanggal_lengkap($r['date_created'])."</td>
				<td><a href='?modul=materi&act=detail&id_materi=$r[id_materi]'>".$r['judul_materi']."</a></td>
				<td><a href='?modul=guru&act=detail&nip=$r[nip]'>".$r['nama']."</a></td>
				<td>".$r['nama_mp']."</td>
			</tr>
			";
	          $no++;
	    }
        echo "</tbody>
		</table>";
        $jmldata = mysql_num_rows(mysql_query("SELECT m.`date_created`,m.`judul_materi`,g.`nama`,sko.`nama_kelas`,mp.`nama_mp`
												FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
												JOIN `guru` g USING(nip)
												JOIN mata_pelajaran mp USING(id_mp) WHERE m.`judul_materi` LIKE '%$_GET[kata]%' OR g.`nama` LIKE '%$_GET[kata]%' OR mp.`nama_mp` LIKE '%$_GET[kata]%' ORDER BY m.`date_created` DESC"));
         
        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

        echo "<div id='paging_page' ><b>Halaman:</b><br>$linkHalaman</div>";   
        break;

  	}

  	case "detail":

  		$detail = mysql_query("SELECT m.`date_created`,m.`judul_materi`,m.`deskripsi`,g.`nip`,g.`nama`,sko.`id_sko`,sko.`nama_kelas`,mp.`nama_mp`,g.`foto`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
										JOIN `guru` g USING(nip)
										JOIN mata_pelajaran mp USING(id_mp)
								WHERE m.`id_materi`='".$_GET['id_materi']."'");
  		$r    = mysql_fetch_array($detail);
  		echo"
					<div style='width:765px;padding-bottom:5px;'>
						<div class='header_box'>
							<h2>Materi: Materi 14</h2>
							<div style='text-align:right;background:#fcfcfc;padding:10px;border:1px solid #ccc'>
								<a href='?modul=materi'>Materi Pelajaran</a> / <b>".$r['judul_materi']."</b>
							</div>
						</div>
						<div style='border-bottom:1px dashed #ccc;margin-bottom:5px;background:#fcfcfc'>
							<table cellpadding='4' cellspacing='2'>
							<tbody>
							<tr>
								<td rowspan='3'>
									<img src='foto_guru/".$r['foto']."' width='100' height='100' alt='' style='padding:1px;border:1px solid #aaaaaa'>
								</td>
								<td>
									<b>Nama Guru</b>
								</td>
								<td>:</td>
								<td>
									<a href='?modul=guru&act=detail&nip=".$r['nip']."'>".$r['nama']."</a>
								</td>
							</tr>
							<tr>
								<td>
									<b>Nama Kelas</b>
								</td>
								<td>:</td>
								<td>
									<a href='?modul=materi&act=list-materi-kelas&id_sko=".$r['id_sko']."&nip=".$r['nip']."'>".$r['nama_kelas']."</a>
								</td>
							</tr>
							<tr>
								<td>
									<b>Nama Matakuliah</b>
								</td>
								<td>:</td>
								<td>
									<b>".$r['nama_mp']."</b>
								</td>
							</tr>
							</tbody>
							</table>
						</div>
						<div class='list_box'>
							<div class='materi_title_box'>".$r['judul_materi']."&nbsp;</div>
							<div style='padding:15px;background:#f5f5f5'>
								".$r['deskripsi']."
								<div style='text-align:right;padding-top:10px'>
									Update : <b>".format_tanggal_lengkap($r['date_created'])."</b>
								</div>
							</div>
						</div>
					</div>

  	";
  	break;

  	case "list-materi-kelas": 	

	    $p      = new Paging7;
	    $batas  = 20;
	    $posisi = $p->cariPosisiM($batas);

	    $tampil = mysql_query("SELECT sko.`nama_kelas`,mp.`nama_mp` FROM `sesi_kelas_online` sko JOIN mata_pelajaran mp USING(id_mp) WHERE sko.`id_sko`='".$_GET['id_sko']."'");
	    $t=mysql_fetch_array($tampil);

	    echo"
  		<div style='width:765px;padding-bottom:5px;'>
						<div class='header_box'>
							<h2>Materi Pelajaran </h2>
							<div style='text-align:right;background:#fcfcfc;padding:10px;border:1px solid #ccc'>
								<a href='?modul=materi'>Materi Pelajaran</a> / <b>".$t['nama_kelas']." - ".$t['nama_mp']."</b>
							</div>
						</div>
						<table style='width:100%' cellpadding='5' cellspacing='1'>
		<tbody>
		<tr style='background:#000000;color:#ffffff;font-weight:bold'>
			<td width='5%'>No</td>
			<td width='20%'>Tanggal</td>
			<td width='30%'>Judul Materi</td>
			<td width='20%'>Nama Guru</td>
			<td width='25%'>Mata Pelajaran</td>
		</tr>
		";
	    $tampil = mysql_query("SELECT m.`id_materi`,m.`date_created`,m.`judul_materi`,g.`nip`,g.`nama`,sko.`nama_kelas`,mp.`nama_mp`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
								JOIN `guru` g USING(nip)
								JOIN mata_pelajaran mp USING(id_mp) 
								WHERE g.`nip`='".$_GET['nip']."' AND sko.`id_sko`='".$_GET['id_sko']."'						
								ORDER BY m.`date_created` ASC LIMIT $posisi,$batas");

	    $no = $posisi+1;	    
	    while($r=mysql_fetch_array($tampil))
	    {
	    	$warna = ($no % 2) == 0 ? "background:#eeeeee" : "background:#ffffff";
	      	echo "

			<tr style='$warna'>
				<td>".$no."</td>
				<td>".format_tanggal_lengkap($r['date_created'])."</td>
				<td><a href='?modul=materi&act=detail&id_materi=$r[id_materi]'>".$r['judul_materi']."</td>
				<td><a href='?modul=guru&act=detail&nip=$r[nip]'>".$r['nama']."</a></td>
				<td>".$r['nama_mp']."</td>
			</tr>
			";
	          $no++;
	    }
        echo "</tbody>
		</table>";
        $jmldata = mysql_num_rows(mysql_query("SELECT m.`id_materi`,m.`date_created`,m.`judul_materi`,g.`nip`,g.`nama`,sko.`nama_kelas`,mp.`nama_mp`
								FROM `materi` m JOIN `sesi_kelas_online` sko USING(id_sko)
								JOIN `guru` g USING(nip)
								JOIN mata_pelajaran mp USING(id_mp) 
								WHERE g.`nip`='".$_GET['nip']."' AND sko.`id_sko`='".$_GET['id_sko']."'						
								ORDER BY m.`date_created` ASC"));
         
        $jmlhalaman  = $p->jumlahHalaman7($jmldata, $batas);
        $linkHalaman = $p->navHalaman7($_GET['halaman'], $jmlhalaman);

        echo "<div id='paging_page' ><b>Halaman:</b><br>$linkHalaman</div>";   
        break;
	}

	echo "</div>";
?>
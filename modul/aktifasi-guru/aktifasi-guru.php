<?php
$aksi="modul/aktifasi-guru/aksi-aktifasi-guru.php";
switch($_GET['act'])
{
  default:
echo"
<div style='width:765px;padding-bottom:5px;'>
	<div class='header_box'>
		<a class='tools' href='index.php'>Kembali</a>
		<h2>Aktifasi Guru Baru</h2>
	</div>
	<script type='text/javascript'>function kk(uname){ location='./?kontak/&amp;COMPOSED=kontak&amp;tFOR=1&amp;idFOR='+uname; }</script>
	<table style='width:100%;border-bottom:1px solid #888888;background:#eeffee' cellspacing='0' cellpadding='4'>
	<tbody>
	<form method=get action='$_SERVER[PHP_SELF]'>
	<input type='hidden' name='modul' value='aktifasi-guru'>
	<tr>
		<td width='100%' align='right'>
			<b>Cari Guru :</b>
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
			<td>No</td>
			<td>NIP</td>
			<td>USERNAME</td>
			<td width='100%'>NAMA GURU</td>
			<td>EMAIL</td>
			<td>AKTIFKAN</td>
			<td>HAPUS</td>			
		</tr>
		";

	    $p      = new Paging;
	    $batas  = 20;
	    $posisi = $p->cariPosisi($batas);

	    $tampil = mysql_query("SELECT * FROM guru JOIN user USING(username) WHERE status='N' ORDER BY `nip` ASC LIMIT $posisi,$batas");
	    

	    $no = $posisi+1;
	    while($r=mysql_fetch_array($tampil))
	    {
	      	$warna = ($no % 2) == 0 ? "background:#eeeeee" : "background:#ffffff";
	      	echo "
			<tr style='$warna'>
				<td>".$no."</td>
				<td>".$r['nip']."</td>
				<td><a href='?modul=aktifasi-guru&act=detail&nip=$r[nip]'>".$r['username']."</a></td>
				<td><a href='?modul=aktifasi-guru&act=detail&nip=$r[nip]'>".$r['nama']."</a></td>
				<td>".$r['email']."</td>
				<td>
					<a class='tools' href=\"$aksi?modul=aktifasi-guru&act=aktif&username=$r[username]&halaman=$_GET[halaman]\" onClick=\"return confirm('Yakin akan mengaktifkan guru ini ?')\">AKTIFKAN</a>
				</td>
				<td>
					<a class='tools' href=\"$aksi?modul=aktifasi-guru&act=hapus&username=$r[username]&halaman=$_GET[halaman]\" onClick=\"return confirm('Yakin akan menghapus data ini ?')\">HAPUS</a>
				</td>				
			</tr>
			";
	          $no++;
	    }
        echo "</tbody>
		</table>";
        $jmldata = mysql_num_rows(mysql_query("SELECT * FROM guru JOIN user USING(username) WHERE status='N'"));
         
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
			<td>No</td>
			<td>NIP</td>
			<td>USERNAME</td>
			<td width='100%'>NAMA GURU</td>
			<td>EMAIL</td>
			<td>AKTIFKAN</td>
			<td>HAPUS</td>			
		</tr>
		";

	    $p      = new Paging;
	    $batas  = 20;
	    $posisi = $p->cariPosisi($batas);

	    $tampil = mysql_query("SELECT * FROM guru JOIN user USING(username) WHERE status='N' AND `nama` LIKE '%$_GET[kata]%' OR `nip` LIKE '%$_GET[kata]%' ORDER BY `nip` DESC LIMIT $posisi,$batas");
	    

	    $no = $posisi+1;
	    while($r=mysql_fetch_array($tampil))
	    {
	      	$warna = ($no % 2) == 0 ? "background:#eeeeee" : "background:#ffffff";
	      	echo "
			<tr style='$warna'>
				<td>".$no."</td>
				<td>".$r['nip']."</td>
				<td><a href='?modul=aktifasi-guru&act=detail&nip=$r[nip]'>".$r['username']."</a></td>
				<td><a href='?modul=aktifasi-guru&act=detail&nip=$r[nip]'>".$r['nama']."</a></td>
				<td>".$r['email']."</td>
				<td>
					<a class='tools' href=\"$aksi?modul=aktifasi-guru&act=aktif&username=$r[username]&halaman=$_GET[halaman]\" onClick=\"return confirm('Yakin akan mengaktifkan guru ini ?')\">AKTIFKAN</a>
				</td>
				<td>
					<a class='tools' href=\"$aksi?modul=aktifasi-guru&act=hapus&username=$r[username]&halaman=$_GET[halaman]\" onClick=\"return confirm('Yakin akan menghapus data ini ?')\">HAPUS</a>
				</td>				
			</tr>
			";
	          $no++;
	    }
        echo "</tbody>
		</table>";
        $jmldata = mysql_num_rows(mysql_query("SELECT * FROM guru JOIN user USING(username) WHERE status='N' AND `nama` LIKE '%$_GET[kata]%' OR `nip` LIKE '%$_GET[kata]%' ORDER BY `nip` DESC LIMIT $posisi,$batas"));
         
        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

        echo "<div id='paging_page' ><b>Halaman:</b><br>$linkHalaman</div>";   
        break;

  	}

  	case "detail":

  		$detail = mysql_query("SELECT * FROM `guru` JOIN user USING(username) WHERE status='N' AND `nip`='$_GET[nip]'");
  		$r    = mysql_fetch_array($detail);
  		echo"
		<div style='width:765px;padding-bottom:5px;'>
			<div class='header_box'>
				<h2>Detail Data Guru Baru [ ".$r['nama']." ]</h2>
			</div>
			<table cellpadding='4' cellspacing='2'>
			<tbody>
			<tr>
				<td colspan='2'>&nbsp;</td>
				<td>
					<img src='foto_guru/".$r['foto']." ' width='100' height='100' alt='' style='padding:1px;border:1px solid #aaaaaa'>
				</td>
			</tr>
			<tr>
				<td>
					<b>Nama Lengkap</b>
				</td>
				<td>:</td>
				<td>".$r['nama']."</td>
			</tr>
			<tr>
				<td>
					<b>NIP</b>
				</td>
				<td>:</td>
				<td>".$r['nip']."</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<b>Tempat & Tanggal Lahir</b>
				</td>
				<td>:</td>
				<td>".$r['tempat'].",".format_tanggal($r['tanggal_lahir'])."</td>
			</tr>
			<tr>
				<td>
					<b>Alamat</b>
				</td>
				<td>:</td>
				<td>".$r['alamat']."</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
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
					<a href='mailto:".$r['email']."'>".$r['email']."</a>
				</td>
			</tr>
			</tbody>
			</table>
		</div>

  	"; 
  	break;

	}

	echo "</div>";
?>
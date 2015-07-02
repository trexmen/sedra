<?php
$aksi="modul/pengumuman/aksi-pengumuman.php";
switch($_GET['act'])
{
  default:
echo"
<div style='width:765px;padding-bottom:5px;'>
	<div class='header_box'>
		<a class='tools' href='index.php'>Kembali</a>
		<h2>Pengumuman Kelas Online</h2>
	</div>
	<script type='text/javascript'>function kk(uname){ location='./?kontak/&amp;COMPOSED=kontak&amp;tFOR=1&amp;idFOR='+uname; }</script>
	<table style='width:100%;border-bottom:1px solid #888888;background:#eeffee' cellspacing='0' cellpadding='4'>
	<tbody>
	<form method=get action='$_SERVER[PHP_SELF]'>
	<input type='hidden' name='modul' value='pengumuman'>
	<tr>
		<td width='30%' align='left'>
			<a href='?modul=pengumuman&act=add' class='inputsubmit'>Buat Pengumuman</a>
		</td>
		<td width='70%' align='right'>		
			<b>Cari Pengumuman :</b>
		</td>
		<td>
			<input value='' type='text' name='kata' id='tc_nama' size='30' class='inputbox' placeholder='Masukkan Keyword Pencarian'></td>
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
			<td width='20%'>JUDUL</td>
			<td width='50%'>DESKRIPSI</td>
			<td width='20%'>TANGGAL</td>
			<td>EDIT</td>
			<td>HAPUS</td>
		</tr>
		";

	    $p      = new Paging;
	    $batas  = 20;
	    $posisi = $p->cariPosisi($batas);

	    $tampil = mysql_query("SELECT `id_pengumuman`,`judul`,CONCAT(SUBSTRING(`deskripsi`, 1, 50),'...') AS 'deskripsi',`image`,`tanggal` FROM pengumuman ORDER BY `tanggal` DESC LIMIT $posisi,$batas");
	    

	    $no = $posisi+1;
	    while($r=mysql_fetch_array($tampil))
	    {
	      	$warna = ($no % 2) == 0 ? "background:#eeeeee" : "background:#ffffff";
	      	echo "
			<tr style='$warna'>
				<td>".$no."</td>
				<td>".$r['judul']."</td>
				<td>".$r['deskripsi']."</td>
				<td>".format_tanggal($r['tanggal'])."</td>
				<td>
					<a class='tools' href='?modul=pengumuman&act=edit&id=$r[id_pengumuman]'>EDIT</a>
				</td>
				<td>
					<a class='tools' href=\"$aksi?modul=pengumuman&act=delete&id=$r[id_pengumuman]\" onClick=\"return confirm('Yakin akan menghapus data ini ?')\">HAPUS</a>
				</td>
			</tr>
			";
	          $no++;
	    }
        echo "</tbody>
		</table>";
        $jmldata = mysql_num_rows(mysql_query("SELECT * FROM pengumuman"));
         
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
			<td width='20%'>JUDUL</td>
			<td width='50%'>DESKRIPSI</td>
			<td width='20%'>TANGGAL</td>
			<td>EDIT</td>
			<td>HAPUS</td>
		</tr>
		";

	    $p      = new Paging;
	    $batas  = 20;
	    $posisi = $p->cariPosisi($batas);

	    $tampil = mysql_query("SELECT `id_pengumuman`,`judul`,CONCAT(SUBSTRING(`deskripsi`, 1, 50),'...') AS 'deskripsi',`image`,`tanggal` FROM pengumuman WHERE `judul` LIKE '%$_GET[kata]%' OR `deskripsi` LIKE '%$_GET[kata]%' ORDER BY `tanggal` DESC LIMIT $posisi,$batas");
	    

	    $no = $posisi+1;
	    while($r=mysql_fetch_array($tampil))
	    {
	      	$warna = ($no % 2) == 0 ? "background:#eeeeee" : "background:#ffffff";
	      	echo "
			<tr style='$warna'>
				<td>".$no."</td>
				<td>".$r['judul']."</td>
				<td>".$r['deskripsi']."</td>
				<td>".format_tanggal($r['tanggal'])."</td>
				<td>
					<a class='tools' href='?modul=pengumuman&act=edit&id=$r[id_pengumuman]'>EDIT</a>
				</td>
				<td>
					<a class='tools' href=\"$aksi?modul=pengumuman&act=delete&id=$r[id_pengumuman]\" onClick=\"return confirm('Yakin akan menghapus data ini ?')\">HAPUS</a>
				</td>
			</tr>
			";
	          $no++;
	    }
        echo "</tbody>
		</table>";
        $jmldata = mysql_num_rows(mysql_query("SELECT * FROM pengumuman WHERE `judul` LIKE '%$_GET[kata]%' OR `deskripsi` LIKE '%$_GET[kata]%' ORDER BY `tanggal` DESC"));
         
        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

        echo "<div id='paging_page' ><b>Halaman:</b><br>$linkHalaman</div>";   
        break;

  	}

  	case "edit":

  		$detail = mysql_query("SELECT * FROM `pengumuman` WHERE `id_pengumuman`='$_GET[id]'");
  		$r    = mysql_fetch_array($detail);
  		echo"
		<div style='width:765px;padding-bottom:5px;'>
			<div class='header_box'>
				<h2>Edit Pengumuman</h2>
			</div>
			<form method='post' action='$aksi?modul=pengumuman&act=edit' style='padding:15px' enctype='multipart/form-data'>
			<input type='hidden' name='id_pengumuman' value='".$r['id_pengumuman']."'>
			<input type='hidden' name='image' value='".$r['image']."'>
			<table cellpadding='4' cellspacing='2'>
			<tbody>
			<tr>
				<td>
					<b>Judul</b>
				</td>
				<td>:</td>
				<td><input type='text' name='judul' value='".$r['judul']."'></td>
			</tr>
			<tr>
				<td valign='top'>
					<b>Deskripsi</b>
				</td>
				<td valign='top'>:</td>
				<td><textarea name='deskripsi' rows='10' cols='50' required>".$r['deskripsi']."</textarea></td>
			</tr>
			<tr>
				<td>
					<b>Tanggal</b>
				</td>
				<td>:</td>
				<td><input type='text' name='tanggal' value='".format_tanggal_lengkap($r['tanggal'])."' disabled></td>
			</tr>
			<tr>
				<td valign='top'><b>Gambar</b></td>
				<td valign='top'>:</td>
				<td>
					<img src='foto_pengumuman/".$r['image']."' height='100' alt='' style='padding:1px;border:1px solid #aaaaaa'><br/>
					<input type='file' name='fupload'>
				</td>
			</tr>
			</tbody>
			</table>
			<input type='submit' value='Simpan Perubahan'>
			</form>
		</div>

  	"; 
  	break;

  	case "add":

  		echo"
		<div style='width:765px;padding-bottom:5px;'>
			<div class='header_box'>
				<h2>Edit Pengumuman</h2>
			</div>
			<form method='post' action='$aksi?modul=pengumuman&act=input' style='padding:15px' enctype='multipart/form-data'>
			<table cellpadding='4' cellspacing='2'>
			<tbody>
			<tr>
				<td>
					<b>Judul</b>
				</td>
				<td>:</td>
				<td><input type='text' name='judul' ></td>
			</tr>
			<tr>
				<td valign='top'>
					<b>Deskripsi</b>
				</td>
				<td valign='top'>:</td>
				<td><textarea name='deskripsi' rows='10' cols='50' required></textarea></td>
			</tr>
			<tr>
				<td valign='top'><b>Gambar</b></td>
				<td valign='top'>:</td>
				<td>
					<img src='foto_pengumuman/default.jpg' height='100' alt='' style='padding:1px;border:1px solid #aaaaaa'><br/>
					<input type='file' name='fupload'>
				</td>
			</tr>
			</tbody>
			</table>
			<input type='submit' value='Simpan Perubahan'>
			</form>
		</div>

  	"; 
  	break;

	}

	echo "</div>";
?>
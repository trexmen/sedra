<?php

$tampil = mysql_query("SELECT * FROM `pengumuman`");
$slider = mysql_query("SELECT * FROM `pengumuman` ORDER BY tanggal DESC LIMIT 5");


echo"
<div style='width:765px;padding-bottom:5px;'>
	<div class='header_box'>
		<h2>Selamat Datang di Kelas Online SMP PGRI Palabuhanratu</h2>
	</div>
	<br>
	<div id='sliderFrame'>
        <div id='slider'>";
        while ($r=mysql_fetch_array($slider)) {
			echo"<img src='foto_pengumuman/$r[image]' alt='$r[judul]' />";
		}
        echo"
        </div>
        <div id='htmlcaption' style='display: none;'>
            <em>HTML</em> caption. Link to <a href='http://www.google.com/'>Google</a>.
        </div>
    </div>
	<div style='text-align:justify;padding:6px;font-size:13px;line-height:18px'>
		<br><br>
		<div class='header_box'>
			<h4>Informasi Kelas Online</h4>
		</div>
		<div style='padding:2px;text-align:center'>			
		</div>";
		while ($r=mysql_fetch_array($tampil)) {
			echo"
		<div class='alert alert-success' style='border:1px #ccc0bb;background:#ECECEC;padding:10px;margin-top:10px;margin-bottom:5px'>
			<b>$r[judul]</b>
			<hr/>
			<table width='100%' border='0'>
			<tbody>
				<tr>
					<td width='20%' rowspan='4'>
						<img src='foto_pengumuman/$r[image]' width='200'>
					</td>
				</tr>
				<tr>					
					<td width='70%' valign='top'>
						$r[deskripsi]
					</td>
				</tr>
				<tr>
					<td width='70%'>						
					</td>
				</tr>
				<tr>
					<td align='right'>
						".format_tanggal_lengkap($r[tanggal])."
					</td>
				</tr>							
			</tbody>
			</table>
		</div>
		";
		}
		echo"
	</div>
</div>";
?>


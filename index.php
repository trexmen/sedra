<?php
session_start();
error_reporting(0);
include "config/format-tanggal.php";

$level = $_SESSION['level'];
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<script type='text/javascript'>
    window.dashboard_config={
      title:'Kuliah Online'
    };
  </script>
<!-- <script type='text/javascript' src='./js/dashboard.js'></script> -->
<style type='text/css'>
</style>
<!-- <script src='js/passport.js'></script> -->
<title>Kelas Online - SMK PGRI Palabuhanratu</title>
<link href='css/style.css' rel='stylesheet' type='text/css'>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> -->
<script type='text/javascript' src='js/main.js'></script>
<script type='text/javascript' src='js/tiny_mce.js'></script>
<meta name='alexaVerifyID' content='IcxltaQT2dmI6uwT5Zs2QG37u48'>
<link rel='stylesheet' type='text/css' href='css/css'>
<!-- <link rel='stylesheet' type='text/css' href='css/passport.css'> -->
<!-- <script async='async' src='js/aroma.js'></script> -->
<link type='image/x-icon' href='images/favicon.ico' rel='icon'>
<link type='image/x-icon' href='images/favicon.ico' rel='shortcut icon'>
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
<script type='text/javascript' async='' src='http://cfs.u-ad.info/cfspushadsv2/request?id=1&enc=telkom2&params=4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRnNRCWi7vKcQQs9RoSjPKnKFRdVDsEOPxjEHIrHCCb19zJkkvAh%2bZvRlO%2fW6GtJfzJvmZehKxKHrgBLVVrxNeC%2b2Ilqpor%2bSy4pB1OofU4gBbwYHtdG4LnXfaCHjFATDRl6Nkcz0YnCuqMG0J4iBlRO9uadfJzYnSSdMxZJh0hDGEGfzbRikQkl%2f7eqmMUVfebPNn7aWJFgkGw%2f80pwLcfHQQsZrLUcuSkQkDoq2vTowV%2bU2pdeJE0%2f%2fQm21RloiRGcFJ%2fUdASGrhxFjrmGpSxVkcN64NwD%2bGxOfQKS2aKWbizKEmfz7qe1Z2xAP%2fzInxjoP5TlpCsQndFA%2b0TcspdPbOWS5hwjBOmFaErrCTegW3Z78P8lK1wsECJW3eURJ9YwCGaLnklz8VQN2Se8mBBX8jwdCR0w8uGxF4wLHZ4FpT3pLlcM0Fl5BY16wXPmZsvQCgxvPfgR5Oya%2fto2OFqoQRjfNlDSG7iWrhNWAQgLLzp34xwipvzSRk2k5gOxZkocYZuv%2fsOUDJvTsavlYGu8NRxmTyjaDdc032MCE1K9PDStcjTpMWcHrZJgtO1A%2bslJSmDHThimqDyCcnTQzfcg%3d%3d&idc_r=70154547434&domain=kuliahonline.unikom.ac.id&sw=1920&sh=1080'></script>
<style id='style-1-cropbar-clipper'>
/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}
.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
}
</style>
<style type='text/css'>
	#paging_page{
		line-height:25px;
		text-align:center;
		margin-top:20px;
		padding:10px;
		border-top:1px solid #ccc;
	}
	#paging_page a,#paging_page a:visited {
		border:1px solid #ccc;
		background:#fff;
		margin-right:2px;
		color:#000;
		padding:5px;
	}
	#paging_page a:hover{
		border-color:#888;
		background-color:#444;
		color:#fff;
		text-decoration:none;
	}
	#paging_page a.xselected,#paging_page a.xselected:hover,#paging_page a.xselected:visited{
		background:#000;
		color:#fff;
		border-color:#666;
		font-weight:bold;
	}
</style>
</head>
<body>

<div id='main_root'>
	<div id='main_kuliahonline'>
		<div id='main_page_header'>
			<div id='main_page_header_logo'>&nbsp;</div>
			<div id='main_top_mainmenu'>
				<?php
				if($level=='admin'){
					echo"<a href='?modul=aktifasi-guru'>Halaman Utama</a>";
				}
				elseif($level=='guru'){
					echo"<a href='?modul=ruang-guru'>Halaman Utama</a>";
				}
				elseif($level=='siswa'){
					echo"<a href='?modul=beranda'>Halaman Utama</a>";
				}
				else{
					echo"<a href='index.php'>Halaman Utama</a>";
				}
				?>
				<a class='menu_listmhs' href='?modul=siswa'>Daftar Siswa</a>
				<a class='menu_listdosen' href='?modul=guru'>Daftar Guru</a>
				<a class='menu_informasi' href='?modul=materi'>Daftar Materi</a>
				<div id='main_top_tgl'><?php echo"$hari_ini, ".format_tanggal_lengkap(date('Y-m-d')) ?></div>
				 &nbsp;
			</div>
		</div>
		<div style='background:#ffffff;border-right:1px solid #eeeeee;border-left:1px solid #eeeeee;'>
			<table cellpadding='0' cellspacing='5'>
			<tbody>
			<tr>
				<td valign='top' style='width:100%'>
					<?php include 'sidebar.php'; ?>
				</td>
				<td valign='top'>
					<?php include 'content.php'; ?>
				</td>
			</tr>
			</tbody>
			</table>
			<div id='main_footer'>
				<br/>
				<b>Kelas Online SMP PGRI Palabuhanratu © 2015</b><br>
				<br/>
			</div>
		</div>
	</div>
	<div id='kulanalitic98y4534'></div>
	
<script type='text/javascript'>

$(document).ready(function(){
  $('#dosen_inputFilter').keyup(function(){
        var dosen_inputFilter=$('#dosen_inputFilter').val();

        $('#dosen_list_view').load('modul/kelas-baru/kelas-baru.php','kata='+dosen_inputFilter);
        
        //lakukan pengiriman data
        // $.ajax({
        //     url:'modul/kelas-baru/kelas-baru.php',
        //     data:'kata='+cari_guru,
        //     cache:false,
        //     success:function(msg){
        //         data=msg.split('|');
                
        //         //masukan isi data ke masing - masing field
        //         $('#nama_barang').val(data[0]);
        //         $('#harga_jual').val(data[1]);
        //         $('#stok').val(data[2]);
        //         $('#jumlah').focus();
        //         //hilangkan status animasi dan loading
        //         $('#status').html('');
        //         $('#loading').hide();
        //     }
        // });
    });       
});

</script>

</body>
</html>
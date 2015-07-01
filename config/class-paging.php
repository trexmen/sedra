<?php
// class paging untuk halaman administrator
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=1>&laquo; Pertama</a>
                    <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$prev>&lsaquo; Sebelumnya</a>";
}
else{ 
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=1>&laquo; Pertama</a>
					<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=1>&lsaquo; Sebelumnya </a>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$i>$i</a>";
  }
	  $angka .= " <a class='xselected'>$halaman_aktif</a>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$i>$i</a>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$next>Selanjutnya &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman>Terakhir &raquo;</a> ";
}
else{
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman>Selanjutnya &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman>Terakhir &raquo;</a> ";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator (pencarian berita)
class Paging9{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=1&kata=$_GET[kata]>&laquo; Pertama</a>
                    <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$prev&kata=$_GET[kata]>&lsaquo; Sebelumnya</a>";
}
else{ 
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=1&kata=$_GET[kata]>&laquo; Pertama</a>
                    <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$prev&kata=$_GET[kata]>&lsaquo; Sebelumnya</a>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$i&kata=$_GET[kata]>$i</a>";
  }
	  $angka .= "<strong>$halaman_aktif</strong>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$i&kata=$_GET[kata]>$i</a>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman&kata=$_GET[kata]>$jmlhalaman</a>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$next&kata=$_GET[kata]>Selanjutnya &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman&kata=$_GET[kata]>Terakhir &raquo;</a> ";
}
else{
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman&kata=$_GET[kata]>Selanjutnya &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&halaman=$jmlhalaman&kata=$_GET[kata]>Terakhir &raquo;</a> ";
}
return $link_halaman;
}
}


// class paging untuk halaman Materi Berdasarkan Mata Pelajaran
class Paging7{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisiM($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman7($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman7($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=1>&laquo; Pertama</a>
                    <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$prev>&lsaquo; Sebelumnya</a>";
}
else{ 
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=1>&laquo; Pertama</a>
					<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=1>&lsaquo; Sebelumnya </a>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$i>$i</a>";
  }
	  $angka .= " <a class='xselected'>$halaman_aktif</a>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$i>$i</a>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$next>Selanjutnya &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$jmlhalaman>Terakhir &raquo;</a> ";
}
else{
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$jmlhalaman>Selanjutnya &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?modul=$_GET[modul]&act=list-materi-kelas&id_sko=$_GET[id_sko]&nip=$_GET[nip]&halaman=$jmlhalaman>Terakhir &raquo;</a> ";
}
return $link_halaman;
}
}

?>

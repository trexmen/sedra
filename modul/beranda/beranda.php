<?php
$aksi="modul/pilih-kelas/aksi-pilih-kelas.php";
switch($_GET['act'])
{
  default:

  $nis=mysql_fetch_array(mysql_query("SELECT `nis` FROM `siswa` WHERE `username`='$_SESSION[username]'"));

//Menampiklan data pengumuman 1 bulan terakhir
  $query = mysql_query("SELECT pk.`id_pengumuman`,pk.`judul`,pk.`deskripsi`,pk.`id_sko`,pk.`date_created`,g.`nip`,g.`nama`,g.`foto`,sko.`nama_kelas`
						FROM `pengumuman_kelas` pk JOIN `sesi_kelas_online` sko USING(id_sko)
									   JOIN `guru` g USING(nip)
									   JOIN `kelas` k USING(id_sko)
									   JOIN `siswa` s USING(nis)
						WHERE s.`nis`='$nis[nis]' AND (pk.`date_created` BETWEEN SUBDATE(SYSDATE(),INTERVAL 14 MONTH) AND SYSDATE())");

  echo"
<div style='width:765px;padding-bottom:5px;'>
	<div class='header_box'>
		<h2>PENGUMUMAN KELAS</h2>
	</div>
	<table width='100%' cellpadding='0' cellspacing='0'>
	<tbody>
	<tr>
		<td width='100%' valign='top'>
			<div style='height:350px;overflow:auto;border-left:1px solid #cccccc'>
				<div id='status_update_div' style='margin:auto;width:100%'>
					&nbsp;";

					while($r=mysql_fetch_array($query)){
					echo"
					<div class='boxStatus_item'>
						<div class='boxStatus_list'>
							<img src='foto_guru/$r[foto]'><a href='?modul=guru&act=detail&nip=$r[nip]'>".$r['nama']."</a><span>".format_tanggal_lengkap($r['date_created'])."</span>
							<p>
								".$r['deskripsi']."
							</p>
						</div>						
					</div>";
					}
					echo"					
				</div>
			</div>
			<script type='text/javascript' src='foto/a2jax.js'></script>
			<script type='text/javascript'>
var timeout_status;
var microblog_var=new Array();
function sendcomment_onclick(){
var mbid = parseInt(this.getAttribute('statusid'));
microblog_var[mbid]['commentform'].style.display 	= '';
microblog_var[mbid]['commenttext'].focus();
return false;
}
function comment_submit_cb(txt,js,mbid){
if (txt=='OK'){
get_status_data(true,mbid);
get_comment_data(mbid);
}
else{
alert('ERROR Server!!!\nSilahkan ulangi beberapa saat lagi...');
}
}
function commentdel_cb(txt,js,arg){
if (txt=='OK'){
var mbid = parseInt(arg[1]);
var cid = parseInt(arg[0]);
microblog_var[mbid]['commentgroup'].removeChild(microblog_var[mbid]['comments'][cid]['group']);
delete microblog_var[mbid]['comments'][cid];
get_status_data(true,mbid);
get_comment_data(mbid);
}
}
function commentdel(){
var mbid = parseInt(this.getAttribute('mid'));
var cid = parseInt(this.getAttribute('cid'));
if (confirm('Yakin akan menghapus komentar ini?')){
var commentData = new a2jax();
commentData.get('./?go/microblog/&delcomment='+cid+'&sid='+mbid,'commentdel_cb',new Array(cid,mbid));
// alert('OK '+mbid+' - '+cid);
}
return false;
}
function cb_incoming_comment(mbl,mbid){
cmid = parseInt(mbl[6]);
if (microblog_var[mbid]['comments'][cmid]){
microblog_var[mbid]['comments'][cmid]['date'].innerHTML		= mbl[2];
}
else{
microblog_var[mbid]['comments'][cmid] 										= new Array();
microblog_var[mbid]['comments'][cmid]['group'] 						=	document.createElement('DIV');
microblog_var[mbid]['comments'][cmid]['group'].className	= 'cb_commentGroup';
microblog_var[mbid]['comments'][cmid]['user']							= document.createElement('A');
microblog_var[mbid]['comments'][cmid]['user'].href					= './?detail/&'+((mbl[5]=='dosen')?'dosen':'mhs')+'='+mbl[1];
microblog_var[mbid]['comments'][cmid]['user'].innerHTML		= mbl[4];
microblog_var[mbid]['comments'][cmid]['user'].style.fontWeight = 'bold';
microblog_var[mbid]['comments'][cmid]['comment']					= document.createElement('span');
microblog_var[mbid]['comments'][cmid]['comment'].innerHTML= '&nbsp;'+mbl[3];
microblog_var[mbid]['comments'][cmid]['profile_pic']			= document.createElement('IMG');
microblog_var[mbid]['comments'][cmid]['profile_pic'].src	= './?go/pic/&'+(mbl[5])+'='+(mbl[1]);
microblog_var[mbid]['comments'][cmid]['footgroup'] 						=	document.createElement('DIV');
microblog_var[mbid]['comments'][cmid]['date']									= document.createElement('span');
microblog_var[mbid]['comments'][cmid]['date'].innerHTML				= mbl[2];
microblog_var[mbid]['comments'][cmid]['footgroup'].appendChild(microblog_var[mbid]['comments'][cmid]['date']);
microblog_var[mbid]['comments'][cmid]['foot_sep1']							= document.createElement('span');
microblog_var[mbid]['comments'][cmid]['foot_sep1'].innerHTML		= '&nbsp;&bull;&nbsp;';	
microblog_var[mbid]['comments'][cmid]['foot_type']							= document.createElement('span');
microblog_var[mbid]['comments'][cmid]['foot_type'].innerHTML		= mbl[5];	
microblog_var[mbid]['comments'][cmid]['footgroup'].appendChild(microblog_var[mbid]['comments'][cmid]['foot_sep1']);
microblog_var[mbid]['comments'][cmid]['footgroup'].appendChild(microblog_var[mbid]['comments'][cmid]['foot_type']);
if (((mbl[1]=='trexmen')&&(mbl[5]=='mahasiswa'))||(('mahasiswa'=='dosen')&&(mbl[5]!='dosen'))){
microblog_var[mbid]['comments'][cmid]['foot_sep']							= document.createElement('span');
microblog_var[mbid]['comments'][cmid]['foot_sep'].innerHTML		= '&nbsp;&bull;&nbsp;';	
microblog_var[mbid]['comments'][cmid]['foot_del']							= document.createElement('a');
microblog_var[mbid]['comments'][cmid]['foot_del'].innerHTML		= 'Hapus';
microblog_var[mbid]['comments'][cmid]['foot_del'].href				= '#';
microblog_var[mbid]['comments'][cmid]['foot_del'].setAttribute('cid',cmid);
microblog_var[mbid]['comments'][cmid]['foot_del'].setAttribute('mid',mbid);
microblog_var[mbid]['comments'][cmid]['foot_del'].onclick			= commentdel;				
microblog_var[mbid]['comments'][cmid]['footgroup'].appendChild(microblog_var[mbid]['comments'][cmid]['foot_sep']);
microblog_var[mbid]['comments'][cmid]['footgroup'].appendChild(microblog_var[mbid]['comments'][cmid]['foot_del']);
}
microblog_var[mbid]['comments'][cmid]['group'].appendChild(microblog_var[mbid]['comments'][cmid]['profile_pic']);
microblog_var[mbid]['comments'][cmid]['group'].appendChild(microblog_var[mbid]['comments'][cmid]['user']);
microblog_var[mbid]['comments'][cmid]['group'].appendChild(microblog_var[mbid]['comments'][cmid]['comment']);
microblog_var[mbid]['comments'][cmid]['group'].appendChild(microblog_var[mbid]['comments'][cmid]['footgroup']);
var before 	= 0;
for (var pos in microblog_var[mbid]['comments']){
if (parseInt(cmid)<parseInt(pos)){
if (before==0){
	before = parseInt(pos);
}
else if (parseInt(before)>parseInt(pos)){
	before = parseInt(pos);
}
}
}
if (before==0){
microblog_var[mbid]['commentgroup'].appendChild(microblog_var[mbid]['comments'][cmid]['group']);
}
else{
microblog_var[mbid]['commentgroup'].insertBefore(microblog_var[mbid]['comments'][cmid]['group'],microblog_var[mbid]['comments'][before]['group']);
}
}
}
function get_comment_data_cb(txt,js,mbid){
microblog_var[mbid]['commentgroup'].style.display = '';
var data_s = txt.split('\n');
for (var i=0;i<data_s.length-1;i++){
var mbl  = data_s[i].split('\t');
if (mbl[0]=='C'){
cb_incoming_comment(mbl,mbid);
}
}
}
function get_comment_data(mbid){
var commentData = new a2jax();
commentData.get('./modul/microblog.php?getcomment='+mbid,'get_comment_data_cb',mbid);
}
function comment_submit(){
var mbid = parseInt(this.getAttribute('statusid'));
if (microblog_var[mbid]['commenttext'].value!=''){
var commentUpdate = new a2jax();
commentUpdate.formAction(microblog_var[mbid]['commentform'],'comment_submit_cb',mbid);
microblog_var[mbid]['commenttext'].value='';
microblog_var[mbid]['commenttext'].onkeyup();
microblog_var[mbid]['commentform'].style.display 	= 'none';
}
}
function link_comment_click(){
var mbid = parseInt(this.getAttribute('statusid'));
if (microblog_var[mbid]['commentgroup'].style.display == ''){
microblog_var[mbid]['commentgroup'].style.display = 'none';
}
else{
get_comment_data(mbid);
}
this.blur();
}
function textcomment_blur(){
if (this.value.length==0){
var mbid = parseInt(this.getAttribute('statusid'));
microblog_var[mbid]['commentform'].style.display 	= 'none';
}
}
function textcomment_change(){
var mbid = parseInt(this.getAttribute('statusid'));
microblog_var[mbid]['commentsubmit'].value				= 'Kirim ( 200 )';
if (this.value.length>200){
this.value=this.value.substring(0,200);
}
microblog_var[mbid]['commentsubmit'].value= 'Kirim ( '+(200-this.value.length)+' )';
if (this.value.length>0){
microblog_var[mbid]['commentsubmit'].disabled='';
}
else{
microblog_var[mbid]['commentsubmit'].disabled='disabled';
}		
}
function cb_incoming_item(mbl){
var mbid = parseInt(mbl[5]);
if (microblog_var[mbid]){
microblog_var[mbid]['date'].innerHTML					= mbl[2];
if (parseInt(microblog_var[mbid]['link_comment'].getAttribute('counter'))!=parseInt(mbl[6])){
microblog_var[mbid]['link_comment'].innerHTML	= '<b>'+(mbl[6])+'</b> Komentar';
microblog_var[mbid]['link_comment'].setAttribute('counter',mbl[6]);
if (microblog_var[mbid]['commentgroup'].style.display == ''){
get_comment_data(mbid);
}
}
}
else{
microblog_var[mbid] = new Array();
microblog_var[mbid]['item'] 									= document.createElement('DIV');
microblog_var[mbid]['item'].className					= 'boxStatus_item';
microblog_var[mbid]['statusgroup']						= document.createElement('DIV');
microblog_var[mbid]['statusgroup'].className 	= 'boxStatus_list';
microblog_var[mbid]['profile_pic']						= document.createElement('IMG');
microblog_var[mbid]['profile_pic'].src				= './?go/pic/&dosen='+mbl[1];
microblog_var[mbid]['user_link']							= document.createElement('A');
microblog_var[mbid]['user_link'].href					= './?detail/&dosen='+mbl[1];
microblog_var[mbid]['user_link'].innerHTML		= mbl[4];
microblog_var[mbid]['date']										= document.createElement('SPAN');
microblog_var[mbid]['date'].innerHTML					= mbl[2];
microblog_var[mbid]['content']								= document.createElement('P');
microblog_var[mbid]['content'].innerHTML			= mbl[3];
microblog_var[mbid]['statusgroup'].appendChild(microblog_var[mbid]['profile_pic']);
microblog_var[mbid]['statusgroup'].appendChild(microblog_var[mbid]['user_link']);
microblog_var[mbid]['statusgroup'].appendChild(microblog_var[mbid]['date']);
microblog_var[mbid]['statusgroup'].appendChild(microblog_var[mbid]['content']);
microblog_var[mbid]['linkgroup']							= document.createElement('DIV');
microblog_var[mbid]['linkgroup'].className		=	'boxStatus_linkGroup';
microblog_var[mbid]['link_comment']						= document.createElement('A');
microblog_var[mbid]['link_comment'].href			= '#';
microblog_var[mbid]['link_comment'].innerHTML	= '<b>'+(mbl[6])+'</b> Komentar';
microblog_var[mbid]['link_comment'].setAttribute('counter',mbl[6]);
microblog_var[mbid]['link_comment'].setAttribute('statusid',mbid);
microblog_var[mbid]['link_comment'].onclick		= link_comment_click;
microblog_var[mbid]['link_comment_sep']						= document.createElement('SPAN');
microblog_var[mbid]['link_comment_sep'].innerHTML	= '&bull;';
microblog_var[mbid]['link_addcomment']						= document.createElement('A');
microblog_var[mbid]['link_addcomment'].href				= '#';
microblog_var[mbid]['link_addcomment'].innerHTML	= 'Kirim Komentar';
microblog_var[mbid]['link_addcomment'].setAttribute('statusid',mbid);
microblog_var[mbid]['link_addcomment'].onclick		= sendcomment_onclick;
microblog_var[mbid]['linkgroup'].appendChild(microblog_var[mbid]['link_comment']);
microblog_var[mbid]['linkgroup'].appendChild(microblog_var[mbid]['link_comment_sep']);
microblog_var[mbid]['linkgroup'].appendChild(microblog_var[mbid]['link_addcomment']);
microblog_var[mbid]['commentgroup']								= document.createElement('DIV');
microblog_var[mbid]['commentgroup'].className			= 'boxStatus_commentGroup';
microblog_var[mbid]['commentgroup'].style.display = 'none';
microblog_var[mbid]['commentform']								= document.createElement('FORM');
microblog_var[mbid]['commentform'].style.display 	= 'none';
microblog_var[mbid]['commentform'].className			= 'boxStatus_commentForm';
microblog_var[mbid]['commentform'].action					=	'./?go/microblog/&statusid='+mbid;
microblog_var[mbid]['commentform'].method					= 'post';
microblog_var[mbid]['commenttext']								= document.createElement('TEXTAREA');
microblog_var[mbid]['commenttext'].name						= 'comment';
microblog_var[mbid]['commenttext'].onchange				= textcomment_change;
microblog_var[mbid]['commenttext'].onkeyup				= textcomment_change;
microblog_var[mbid]['commenttext'].onblur					= textcomment_blur;
microblog_var[mbid]['commenttext'].setAttribute('statusid',mbid);
microblog_var[mbid]['commentsubmit']							= document.createElement('INPUT');
microblog_var[mbid]['commentsubmit'].type					= 'button';
microblog_var[mbid]['commentsubmit'].value				= 'Kirim ( 200 )';
microblog_var[mbid]['commentsubmit'].disabled			= 'disabled';
microblog_var[mbid]['commentsubmit'].name					= 's1';
microblog_var[mbid]['commentsubmit'].onclick			= comment_submit;
microblog_var[mbid]['commentsubmit'].setAttribute('statusid',mbid);
microblog_var[mbid]['commentform'].appendChild(microblog_var[mbid]['commenttext']);
microblog_var[mbid]['commentform'].appendChild(microblog_var[mbid]['commentsubmit']);
microblog_var[mbid]['item'].appendChild(microblog_var[mbid]['statusgroup']);
microblog_var[mbid]['item'].appendChild(microblog_var[mbid]['commentgroup']);
microblog_var[mbid]['item'].appendChild(microblog_var[mbid]['linkgroup']);
microblog_var[mbid]['item'].appendChild(microblog_var[mbid]['commentform']);
microblog_var[mbid]['comments']=new Array();
var before_p 	= 0;
for (var pos_p in microblog_var){
if (parseInt(mbid)>parseInt(pos_p)){
if (parseInt(before_p)<parseInt(pos_p)){
	before_p = parseInt(pos_p);
}
}
}
if (before_p==0){
getID('status_update_div').appendChild(microblog_var[mbid]['item']);
}
else{
getID('status_update_div').insertBefore(microblog_var[mbid]['item'],microblog_var[before_p]['item']);
}
}
}
function cb_status_data(txt,js,isRefresh){
var data_s = txt.split('\n');		
for (var i=0;i<data_s.length-1;i++){
var mbl  = data_s[i].split('\t');
if (mbl[0]=='S')
cb_incoming_item(mbl);
}
timeout_status = setTimeout('get_status_data(true);',120000);
}
function get_status_data(isRefresh,filteronly){
clearTimeout(timeout_status);
var hUpdate = new a2jax();
if (filteronly)
hUpdate.get('./modul/microblog.php?onlyid='+filteronly,'cb_status_data',isRefresh);
else
hUpdate.get('./modul/microblog.php','cb_status_data',isRefresh);
}
get_status_data(true);
			</script>
		</td>
	</tr>
	</tbody>
	</table>
	<div class='header_box'>
		<h3>MATA PELAJARAN</h3>
	</div>";

	
	$tampil = mysql_query("SELECT k.`id_kelas`,sko.`id_sko`,sko.`nama_kelas`,mp.`nama_mp`,g.`nip`,g.`nama`
					FROM `kelas` k JOIN `siswa` s USING(nis)
						     JOIN `sesi_kelas_online` sko USING(id_sko)
						     JOIN `mata_pelajaran` mp USING(id_mp)
						     JOIN `guru` g USING(nip)
					WHERE nis='$nis[nis]' ORDER BY g.`nama` ASC ");
	$no=0;    
    while($r=mysql_fetch_array($tampil))
    {
	    	$no++;
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

		<div class='list_box'>
			<div class='kelas_title_box'>				
				<a class='tools' href=\"$aksi?modul=pilih-kelas&act=hapus&id_kelas=$r[id_kelas]\" onClick=\"return confirm('Yakin akan keluar dari kelas ini ?')\">Keluar dari Kelas Ini</a>".$no.". ".$r['nama_kelas']."
			</div>
			<div style='padding:10px;line-height:18px;font-size:12px;background:#f5f5f5'>
				<table width='100%' cellpadding='4' cellspacing='1'>
				<tbody>
				<tr>
					<td width='30%'>Nama Mata Pelajaran :</td>
					<td width='70%' colspan='3' style='background:#ffffff'>
						<b>".$r['nama_mp']."</b>
					</td>
				</tr>
				<tr>
					<td width='30%'>Nama Guru yang Mengajar :</td>
					<td width='70%' colspan='3' style='background:#ffffff'>
						<b><a href='?modul=guru&act=detail&nip=".$r['nip']."'>".$r['nama']."</a></b>
					</td>
				</tr>
				<tr>
					<td width='30%'>Jumlah Siswa pada Kelas ini :</td>
					<td width='70%' colspan='3' style='text-align:right;background:#ffffff'>
						<b>".$s['jumlah_siswa']."</b>
					</td>
				</tr>
				<tr>
					<td width='30%'>Jumlah Materi :</td>
					<td width='20%' style='text-align:right;background:#ffffff'>
						<b style='color:#006600'>".$m['jumlah_materi']."</b>
					</td>
					<td width='30%'>Jumlah Pengumuman :</td>
					<td width='20%' style='text-align:right;background:#ffffff'>
						<b style='color:#006600'>0</b>
					</td>
				</tr>
				</tbody>
				</table>
			</div>
			<div class='kelas_toolsbox'>
				<a class='tool_kelas' href='?modul=masuk-kelas&nis=$nis[nis]&id_sko=$r[id_sko]'>Masuk Kelas</a><a class='tool_mhs' href='?modul=list-siswa&nis=$nis[nis]&id_sko=$r[id_sko]'>Daftar Siswa</a>
				<div class='clearboth'>&nbsp;</div>
			</div>
		</div>
		";
	}
}
	echo"
</div>";

?>

function getID(field)
{
	return document.getElementById ? document.getElementById(field) : document.all(field);
}
ThisIE=(document.all)?true:false;

function LoginCheck(field){
	if (getID('IDLOGIN').value&&getID('PASSWORDLOGIN').value&&(getID('tipeLogin2').checked||getID('tipeLogin1').checked)){return true;}
	else {alert('Silahkan Isi Terlebih dahulu\nsemua field di form login...');return false;}
}
function popUp(field){
    wind=window.open('about:blank','','');
    wind.focus();
    wind.location=field.href;
    return false;
}
function checkSubmitDaftar(){
	if (getID('xID').value.length<3){
		alert ('Maaf ID Minimal 3 karakter');
		return false;
	}
	bs='`~!@#$%^ &*()-+=|\\][{}\'";:?/.,><';
	for (i=0;i<bs.length;i++){
	if (("g"+getID('xID').value).indexOf(bs.substring(i,i+1))>0){
	alert('Maaf Dilarang menggunakan spasi\ndan karakter-karakter khusus dalam ID kecuali garis bawah');
	return false;
	}
	}
	if (getID('xPASSWORD').value.length<3){
		alert ('Password ID Minimal 3 karakter');
		return false;
	}
	if (getID('xPASSWORD').value!=getID('xPASSWORD2').value){
		alert ('Maaf Password 1 dan Password 2 Tidak Cocok!..');
		return false;
	}
	if (!getID('xNAMA').value||!getID('xALAMAT').value){
		alert ('Silahkan isi Nama Lengkap dan Alamat.');
		return false;
	}
	if (getID('xEMAIL').value.indexOf('@')<2||getID('xEMAIL').value.indexOf('.')<2){
		alert ('Silahkan masukan email anda dengan benar.');
		return false;
	}
	return true;
}
function checkSubmitDaftarMHS(){
	vOUT=checkSubmitDaftar();
	if (vOUT){
		if (!getID('xNIM').value||!getID('FAKULTASx').value||!getID('JURUSANx').value||!getID('xKELAS').value){
			alert('Silahkan Masukan NIM, Fakultas,\nJurusan dan Kelas terlebih dahulu...');
			return false;
		}
	}
	else{
		return false;
	}
	return true;
}
var error=0;
var fakultas_teknik=new Array('Sistem Informasi (S2)','Manajemen (S2)','Teknik Informatika','Teknik Komputer','Teknik Industri','Teknik Elektro','Teknik Sipil','Teknik Arsitektur','Planologi','Sistem Informasi - S1','Manajemen Informatika','Komputerisasi Akuntansi');
var kode_teknik=new Array('SI_S2','M_S2','IF','TK','TI','TE','TS','AR','PL','SI_S1','MI','KA');
var fakultas_ekonomi=new Array('Akuntansi','Manajemen Pemasaran','Keuangan Perbankan','Manajemen');var kode_ekonomi=new Array('AK','MP','KP','MN');
var fakultas_hukum=new Array('Hukum');var kode_hukum=new Array('HK');
var fakultas_desain=new Array('Desain Komunikasi Visual','Desain Interior');var kode_desain=new Array('DK','DI');
var fakultas_sospol=new Array('Ilmu Komunikasi','Hubungan Internasional','Ilmu Pemerintahan','Sekertaris Eksekutif','Public Relation');var kode_sospol=new Array('IK','HI','IP','SE','PR');
var fakultas_sastra=new Array('Sastra Inggris','Sastra Jepang');var kode_sastra=new Array('SI','SJ');
var fakultas_pascasarjana=new Array('Magister Desain','Magister Sistem Informasi','Magister Manajemen');var kode_pascasarjana=new Array('MDS','MSI','MM');
function rubahFak(ar,jurusan)
{
	getID('JURUSANx').innerHTML="";
	getID('JURUSANx').options[0]=new Option('--Pilih Terlebih dahulu Fakultas--','',true,true);
	Vfak=null;
	if (ar){
	var Vfak=eval('fakultas_'+ar);	
	var Vfak2=eval('kode_'+ar);	
	getID('JURUSANx').options[0]=new Option("","",false,false);
	for (GG=0;GG<Vfak.length;GG++)
	getID('JURUSANx').options[GG+1]=new Option(Vfak2[GG]+" - "+Vfak[GG],Vfak2[GG],(jurusan==Vfak[GG-1])?true:false,(jurusan==Vfak[GG-1])?true:false);
	}
}
function NimKeyUp(field){
	if (field.value.length<8){
	getID('TRFakultas').style.visibility=getID('TRJurusan').style.visibility=getID('TRKelas').style.visibility='hidden';
	}
	else{
	field.value=field.value.substring(0,10);
 	getID('TRFakultas').style.visibility=getID('TRJurusan').style.visibility=getID('TRKelas').style.visibility='visible';
 	}
}

//---- EDITOR
function load_editor(elname,isadvance){
    if (isadvance){
      tinyMCE.init({
        mode : "exact",
        theme : "advanced",
        skin : "o2k7",
        elements : elname,
        document_base_url : '/',
        cleanup : true,
        cleanup_on_startup : true,
        verify_css_classes : true,
        verify_html : true,
        invalid_elements : "font,iframe,form,textarea,input,script",
        inline_styles : true,
        convert_newlines_to_brs : false,
        doctype : '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
        force_hex_style_colors : true,
        relative_urls : false,
        plugins : "inlinepopups,elink,style,preview,searchreplace,contextmenu,paste,fullscreen",
        theme_advanced_buttons1 : "fullscreen,preview,code,|,undo,redo,|,search,replace,|,cleanup,removeformat,|,elink,unlink,anchor,|,charmap,|,forecolor,backcolor",
        theme_advanced_buttons2 : "styleprops,formatselect,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,outdent,indent",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "none",
        theme_advanced_resizing : false
      }
      );
    }
    else{
        tinyMCE.init({
        mode : "exact",
        theme : "advanced",
        skin : "o2k7",
        elements : elname,
        document_base_url : '/',
        cleanup : true,
        cleanup_on_startup : true,
        verify_css_classes : true,
        verify_html : true,
        invalid_elements : "font,iframe,form,textarea,input,script",
        inline_styles : true,
        convert_newlines_to_brs : false,
        doctype : '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
        force_hex_style_colors : true,
        relative_urls : false,
        plugins : "elink",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,elink,unlink,anchor,|,bullist,numlist,outdent,indent,|,forecolor,backcolor",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "none",
        theme_advanced_resizing : false
      }
      );
    }
}
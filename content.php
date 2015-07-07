<?php
include "config/koneksi.php";
include "config/class-paging.php";
include "config/ukuran-file.php";

if (!isset($_GET['modul'])){
    include "modul/home/home.php";
}

// Bagian Guru
elseif ($_GET['modul']=='home'){
    include "modul/home/home.php";
}

// Bagian Guru
elseif ($_GET['modul']=='guru'){
    include "modul/guru/guru.php";
}

// Bagian Siswa
elseif ($_GET['modul']=='siswa'){
    include "modul/siswa/siswa.php";
}

// Bagian List Siswa
elseif ($_GET['modul']=='list-siswa'){
    include "modul/siswa/list-siswa.php";
}

// Bagian Materi
elseif ($_GET['modul']=='materi'){
    include "modul/materi/materi.php";
}

// Bagian Beranda
elseif ($_GET['modul']=='beranda'){
  if ($_SESSION['level']=='siswa'){
    include "modul/beranda/beranda.php";
  }
  elseif ($_SESSION['level']=='guru'){
    include "modul/beranda/beranda_guru.php";
  }
}

// Bagian Kelas Baru
elseif ($_GET['modul']=='kelas-baru'){
  if ($_SESSION['level']=='siswa'){
    include "modul/kelas-baru/kelas-baru.php";
  }
}

// Bagian Pilih Kelas
elseif ($_GET['modul']=='pilih-kelas'){
  if ($_SESSION['level']=='siswa'){
    include "modul/pilih-kelas/pilih-kelas.php";
  }
}

// Bagian Masuk Kelas
elseif ($_GET['modul']=='masuk-kelas'){
  if ($_SESSION['level']=='siswa'){
    include "modul/masuk-kelas/masuk-kelas.php";
  }
}


// Bagian Diskusi
elseif ($_GET['modul']=='diskusi'){
  if ($_SESSION['level']=='siswa'){
    include "modul/diskusi/diskusi.php";
  }
}

// Bagian Nilai
elseif ($_GET['modul']=='nilai'){
  if ($_SESSION['level']=='siswa'){
    include "modul/nilai/nilai.php";
  }
}

// Bagian Acount
elseif ($_GET['modul']=='acount'){
  if ($_SESSION['level']=='siswa'){
    include "modul/acount/acount.php";
  }
  elseif ($_SESSION['level']=='guru'){
    include "modul/acount/acount-guru.php";
  }
  elseif ($_SESSION['level']=='admin'){
    include "modul/acount/acount-admin.php";
  }
}

// Bagian Manajemen User
elseif ($_GET['modul']=='manajemen-user'){
  if ($_SESSION['level']=='admin'){
    include "modul/manajemen-user/manajemen-user.php";
  }
}

// Bagian Update Profil
elseif ($_GET['modul']=='update-profil'){
  if ($_SESSION['level']=='admin' OR $_SESSION[level]=='user'){
    include "modul/update-profil/update-profil.php";
  }
}

//-----------------------------------------------

// Bagian Ruang Guru
elseif ($_GET['modul']=='ruang-guru'){
  if ($_SESSION['level']=='guru'){
    include "modul/ruang-guru/ruang-guru.php";
  }
}

// Bagian Buat Kelas
elseif ($_GET['modul']=='buat-kelas'){
  if ($_SESSION['level']=='guru'){
    include "modul/buat-kelas/buat-kelas.php";
  }
}

// Bagian Tambah Materi
elseif ($_GET['modul']=='tambah-materi'){
  if ($_SESSION['level']=='guru'){
    include "modul/materi/tambah-materi.php";
  }
}

// Bagian Guru Masuk Kelas
elseif ($_GET['modul']=='guru-masuk-kelas'){
  if ($_SESSION['level']=='guru'){
    include "modul/masuk-kelas/guru-masuk-kelas.php";
  }
}

//------------------------------------------------

// Bagian Admin
elseif ($_GET['modul']=='aktifasi-guru'){
  if ($_SESSION['level']=='admin'){
    include "modul/aktifasi-guru/aktifasi-guru.php";
  }
}

// Bagian Ruang Guru
elseif ($_GET['modul']=='daftar-guru'){
  if ($_SESSION['level']=='admin'){
    include "modul/guru/daftar-guru.php";
  }
}

// Bagian Ruang Guru
elseif ($_GET['modul']=='daftar-siswa'){
  if ($_SESSION['level']=='admin'){
    include "modul/siswa/daftar-siswa.php";
  }
}

// Bagian Admin
elseif ($_GET['modul']=='pengumuman'){
  if ($_SESSION['level']=='admin'){
    include "modul/pengumuman/pengumuman.php";
  }
}

// Bagian Registrasi
elseif ($_GET['modul']=='reg'){
    include "modul/registrasi/registrasi.php";
}

// Apabila modul tidak ditemukan
else{
  echo"<center>ERROR 404 : PAGE NOT FOUND</center>";
}
?>

<script type="text/javascript">
$(document).ready(function(){

  //loadData();

  function loadData(){
    $("#jsondata tbody").html("");  
    $.ajax({
          url:"modul/kelas-baru/json-kelas-baru.php",
          data:"op=load",
          cache:false,
          success:function(data){
            //alert(data);
              data = JSON.parse(data);
          $.each(data.guru_php, function(i,guru){
          var newRow =

                "<tr>"                 
                  +"<td colspan='2'><b style='font-size:14px'>"+guru.nama+"</b></td>"
                  +"<td></td>"
                  +"<td><a href='?modul=pilih-kelas&nip="+guru.nip+"' class='inputsubmit'>Pilih Guru Ini</a></td>"
                +"</tr>"
                +"<tr>"
                  +"<td rowspan='3'><img src='foto_guru/"+guru.foto+"' style='border:1px solid #cccccc;padding:1px;background:#ffffff' width='100' height='100' alt=''></td>"
                  +"<td >Jumlah Kelas</td>"
                  +"<td >:</td>"
                  +"<td>0</td>"
                +"</tr>"
                +"<tr>"
                  +"<td >Jumlah Materi</td>"
                  +"<td >:</td>"
                  +"<td >0</td>"
                +"</tr>"
                +"<tr>"
                  +"<td >Jumlah Siswa yang diajar </td>"
                  +"<td >:</td>"
                  +"<td >0</td>"
                +"</tr>";

                



          $(newRow).appendTo("#jsondata tbody");
        });                        
          }                
      });
  }


  $("#dosen_inputFilter").keyup(function(){
    var keyword=$("#dosen_inputFilter").val();
    $("#jsondata tbody").html("");    
    $.ajax({
          url:"modul/kelas-baru/json-kelas-baru.php",
          data:"op=search&keyword="+keyword,
          cache:false,
          success:function(data){
            //alert(data);
              data = JSON.parse(data);
          $.each(data.guru_php, function(i,guru){
          var newRow =
          "<tr>"
          +"<td>"+guru.nip+"</td>"
          +"<td>"+guru.nama+"</td>"
          +"<td>"+guru.tempat+"</td>"
          +"<td>"+guru.tanggal_lahir+"</td>"
          +"<td>"+guru.alamat+"</td>"
          +"<td>"+guru.foto+"</td>"
          +"<td>"+guru.email+"</td>"
          +"<td>"+guru.username+"</td>"
          +"<td>"+guru.date_created+"</td>"
          +"</tr>" ;
          $(newRow).appendTo("#jsondata tbody");
        });                        
          }                
      });
  });

  $("#nip").keypress(function(e){
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        alert("Mohon masukan angka");
        return false;
      }
  });

  $("#nis").keypress(function(e){
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        alert("Mohon masukan angka");
        return false;
      }
  });

});






</script>






  


<?php
function send_email($level,$nama,$email,$username,$password){
$pesan.="<table>
      <tr>
          <td>Tipe Akun </td>
          <td>: </td>
          <td>$level </td>          
      </tr>
      <tr>
          <td>Nama </td>
          <td>: </td>
          <td>$nama </td>          
      </tr>
      <tr>
          <td>Email </td>
          <td>: </td>
          <td>$email </td>          
      </tr>
      <tr>
          <td>username </td>
          <td>: </td>
          <td>$username </td>          
      </tr>
      <tr>
          <td>password </td>
          <td>: </td>
          <td>$password </td>          
      </tr>
      </table>";

$subjek="Pemulihan Password";

// Kirim email dalam format HTML
$dari = "From: admin@kelasonline.com \n";
$dari .= "Content-type: text/html \r\n";

// Kirim email ke kustomer
mail($email,$subjek,$pesan,$dari);


// Kirim email ke pengelola toko online
//mail("admin@kelasonline.com",$subjek,$pesan,$dari);
}
?>
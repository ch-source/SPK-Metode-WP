<?php
include"koneksi.php";
$id = $_GET['id'];
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
  $query_a="UPDATE tbl_user SET username='$username', password='$pass1' WHERE id_user='$id'";
  $sql_a=mysqli_query($connect, $query_a);
  if ($sql_a) {
    echo "<script>alert('Username & Password Berhasil Diubah, Silahkan Login Lagi');
    document.location.href='login.php'</script>\n";
  }else{
    echo "<script>alert('Proses Registrasi Gagal!');
    document.location.href=dashboard_pelamar.php?p=edit_uspas&id=".$id."'</script>\n";
  }

?>
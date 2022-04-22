<?php
include"koneksi.php";
session_start();

$id=$_GET['id'];
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];

  $query2="UPDATE tbl_user SET nama_user='$nama', telepon_user='$telepon', email_user='$email' WHERE id_user='$id'";
  $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
          echo "<script>alert('Data Anda Berhasil Diubah.');
          document.location.href='dashboard_kepsek.php?p=index_kepsek'</script>\n";

      }else{
        echo "<script>alert('Data Anda Gagal Diubah !');
        document.location.href=dashboard_kepsek.php?p=edit_user&id=".$id."'</script>\n";
      }
?>
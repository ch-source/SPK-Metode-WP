<?php
include"koneksi.php";
$id = $_GET['id'];
$deskripsi = $_POST['deskripsi'];

$query2="UPDATE tbl_syarat_pendaftaran SET syarat='$deskripsi' WHERE id_pendaftaran='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
  header("location:dashboard_panitia.php?p=input_pendaftaran");
}else{
  header("location:dashboard_panitia.php?p=input_pendaftaran");
}
?>
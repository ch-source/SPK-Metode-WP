<?php
include"koneksi.php";
$id = $_POST['id'];
$deskripsi = $_POST['deskripsi'];

$query2="INSERT INTO `tbl_syarat_pendaftaran` (`id_pendaftaran`, `syarat`) VALUES ('$id', '$deskripsi')";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
  header("location:dashboard_panitia.php?p=input_pendaftaran");
}else{
  header("location:dashboard_panitia.php?p=input_pendaftaran");
}
?>
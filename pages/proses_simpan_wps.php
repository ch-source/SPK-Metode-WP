<?php
include"koneksi.php";

$wp = $_POST['wp'];
$lowongan = $_POST['lowongan'];
$tps = $_POST['tps'];
$jps = $_POST['jps'];
$cek = mysqli_query($connect, "SELECT * FROM tbl_timer WHERE id_pendaftaran = '$lowongan'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
if ($result > 0) {
  $query2="UPDATE tbl_timer SET waktu='$wp', tgl_pelaksanaan='$tps', jam_pelaksanaan='$jps' WHERE id_pendaftaran='$lowongan'";
  $sql2=mysqli_query($connect, $query2);
  echo "<script>alert('Sukses..');
  document.location.href='dashboard_panitia.php?p=wps'</script>\n";
}else if ($result ==0) {
  $query2="INSERT INTO `tbl_timer` (`id_timer`, `waktu`, `id_pendaftaran`, `tgl_pelaksanaan`, `jam_pelaksanaan`) VALUES ('', '$wp', '$lowongan', '$tps', '$jps')";
  $sql2=mysqli_query($connect, $query2);
  echo "<script>alert('Berhasil..');
  document.location.href='dashboard_panitia.php?p=wps'</script>\n";
}
?>
<?php
include"koneksi.php";
$id = $_GET['id'];
$wp = $_POST['wpa'];
$lowongan = $_POST['lowongana'];
$tps = $_POST['tps_a'];
$jps = $_POST['jps_a'];
  $query2="UPDATE tbl_timer SET waktu='$wp', id_lowongan='$lowongan' tgl_pelaksanaan='$tps', jam_pelaksanaan='$jps' WHERE id_timer='$id'";
  $sql2=mysqli_query($connect, $query2);
  echo "<script>alert('Sukses..');
  document.location.href='dashboard_hrd.php?p=wps'</script>\n";

?>
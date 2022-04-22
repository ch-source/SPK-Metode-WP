<?php
include"koneksi.php";
$id = $_GET['id'];


$query2="DELETE FROM tbl_syarat_pendaftaran WHERE id_pendaftaran='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
	$query3="DELETE FROM tbl_pendaftaran WHERE id_pendaftaran='$id'";
	$sql3=mysqli_query($connect, $query3);
	if ($sql3) {
  		echo "<script>alert('Data Info Pendaftaran Berhasil Dihapus');
         document.location.href='dashboard_panitia.php?p=data_pendaftaran'</script>\n";
  	}else{
  		echo "<script>alert('Data Info Pendaftaran Gagal Dihapus');
         document.location.href='dashboard_panitia.php?p=data_pendaftaran'</script>\n";
}
}
?>
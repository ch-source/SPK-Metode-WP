<?php
include"koneksi.php";
$id = $_GET['id'];


$query2="DELETE FROM tbl_syarat_lowongan WHERE id_lowongan='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
	$query3="DELETE FROM tbl_lowongan WHERE id_lowongan='$id'";
	$sql3=mysqli_query($connect, $query3);
	if ($sql3) {
  		echo "<script>alert('Data Lowongan Berhasil Dihapus');
         document.location.href='dashboard_hrd.php?p=data_lowongan'</script>\n";
  	}else{
  		echo "<script>alert('Data Lowongan Gagal Dihapus');
         document.location.href='dashboard_hrd.php?p=data_lowongan'</script>\n";
}
}
?>
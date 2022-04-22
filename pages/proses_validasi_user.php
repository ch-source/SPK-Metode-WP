<?php
include"koneksi.php";
$id = $_GET['id'];


$query2="UPDATE tbl_user SET status_user='Valid' WHERE id_user='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
	echo "<script>alert('Data Registrasi Pelamar Berhasil Divalidasi');
	document.location.href='dashboard_hrd.php?p=data_pelamar'</script>\n";
}else{
	echo "<script>alert('Data Registrasi Pelamar Berhasil Divalidasi');
	document.location.href='dashboard_hrd.php?p=data_pelamar'</script>\n";
}
?>
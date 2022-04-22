<?php
include"koneksi.php";
$id = $_GET['id'];


$query2="DELETE FROM tbl_kriteria WHERE id_kriteria='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
  		echo "<script>alert('Data Kriteria Berhasil Dihapus');
         document.location.href='dashboard.php?p=data_kriteria'</script>\n";
  	}else{
  		echo "<script>alert('Data Kriteria Gagal Dihapus');
         document.location.href='dashboard.php?p=data_kriteria'</script>\n";
}
?>
<?php
include"koneksi.php";
$id = $_GET['id'];


$query2="DELETE FROM tbl_soal WHERE id_soal='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
  		echo "<script>alert('Data Soal Berhasil Dihapus');
         document.location.href='dashboard_panitia.php?p=data_soal'</script>\n";
  	}else{
  		echo "<script>alert('Data Soal Gagal Dihapus');
         document.location.href='dashboard_panitia.php?p=data_soal'</script>\n";
}
?>
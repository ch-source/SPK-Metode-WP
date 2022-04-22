<?php
include"koneksi.php";
$id=$_GET['id'];

$query2="UPDATE tbl_lamaran SET status_berkas='Oke' WHERE id_lamaran='$id'";
$sql2=mysqli_query($connect, $query2);
echo "<script>alert('Sukses....');
    document.location.href='dashboard_hrd.php?p=data_lamaran'</script>\n";
 
?>
<?php
include"koneksi.php";

$aspek = $_POST['aspek'];
$query2="INSERT INTO `tbl_aspek_interview` (`id_aspek`, `nama_aspek`) VALUES ('', '$aspek')";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
	 echo "<script>alert('Aspek penilaian interview berhasil disimpan');
    document.location.href='dashboard_hrd.php?p=aspek_interview'</script>\n";
}else{
	 echo "<script>alert('Aspek penilaian interview gagal disimpan');
    document.location.href='dashboard_hrd.php?p=aspek_interview'</script>\n";
}
    
?>
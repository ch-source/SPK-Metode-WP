<?php
include"koneksi.php";
$id=$_GET['id'];
$aspek = $_POST['aspek'];
$query2="UPDATE tbl_aspek_interview SET nama_aspek='$aspek' WHERE id_aspek='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
	 echo "<script>alert('Aspek penilaian interview berhasil diubah');
    document.location.href='dashboard_hrd.php?p=aspek_interview'</script>\n";
}else{
	 echo "<script>alert('Aspek penilaian interview gagal diubah');
    document.location.href='dashboard_hrd.php?p=aspek_interview'</script>\n";
}
    
?>
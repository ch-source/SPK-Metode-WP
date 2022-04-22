<?php 
include"koneksi.php";
$id=$_GET['id'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$fotobaru = date('dmYHis').$foto;
$path = "berkas/".$fotobaru;
if(move_uploaded_file($tmp, $path)){

	$query="UPDATE tbl_lamaran SET foto='$fotobaru' WHERE id_lamaran='$id'";
	$sql=mysqli_query($connect, $query);
	if ($sql) {
		echo "<script>alert('Foto Berhasil Diupload');
		document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
	}else{
		echo "<script>alert('Foto Gagal Diupload');
		document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
	}
}else{
	echo "<script>alert('Foto Gagal Diupload');
	document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
}
?>
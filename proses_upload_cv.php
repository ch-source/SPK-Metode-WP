<?php
include "koneksi.php";
$id=trim($_GET['id']);

$tipe_file = $_FILES['nama_file']['type']; 
if ($tipe_file == "application/pdf")
{
$nama_file = trim($_FILES['nama_file']['name']);
 $nama_baru = "cv_".$id.".pdf";
 $file_temp = $_FILES['nama_file']['tmp_name']; 
 $folder    = "berkas";

 move_uploaded_file($file_temp, "$folder/$nama_baru");
 $query="UPDATE tbl_lamaran SET cv='$nama_baru' WHERE id_lamaran='$id'";
 $sql=mysqli_query($connect, $query);
 if ($sql) {
 	  echo "<script>alert('CV Berhasil Diupload.');
 	  document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
 }else{
 	 echo "<script>alert('CV Berhasil Diupload.');
 	  document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
 }
} else{
	 echo "<script>alert('CV Berhasil Diupload.');
 	  document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
}
?>
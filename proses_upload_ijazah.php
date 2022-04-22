<?php
include "koneksi.php";
$id=trim($_GET['id']);

$tipe_file = $_FILES['nama_file']['type']; 
if ($tipe_file == "application/pdf")
{
$nama_file = trim($_FILES['nama_file']['name']);
 $nama_baru = "ijazah_".$id.".pdf";
 $file_temp = $_FILES['nama_file']['tmp_name']; 
 $folder    = "berkas";

 move_uploaded_file($file_temp, "$folder/$nama_baru");
 $query="UPDATE tbl_lamaran SET ijazah='$nama_baru' WHERE id_lamaran='$id'";
 $sql=mysqli_query($connect, $query);
 if ($sql) {
 	  echo "<script>alert('Ijazah Berhasil Diupload.');
 	  document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
 }else{
 	 echo "<script>alert('Ijazah Berhasil Diupload.');
 	  document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
 }
} else{
	 echo "<script>alert('Ijazah Lamaran Berhasil Diupload.');
 	  document.location.href='dashboard_pelamar.php?p=berkas_lamaran&id=".$id."'</script>\n";
}
?>
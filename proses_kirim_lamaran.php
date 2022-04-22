<?php
include "koneksi.php";
$id=trim($_GET['id']);
$idlowongan=trim($_POST['idlowongan']);

$tipe_file = $_FILES['nama_file']['type']; //mendapatkan mime type
if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
{
$nama_file = trim($_FILES['nama_file']['name']);
 //mengganti nama pdf
 $nama_baru = "sl_".$id.".pdf"; //hasil contoh: file_1.pdf
 $file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
 $folder    = "berkas"; //folder tujuan

 move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
 //update nama file di database
 $query="INSERT INTO `tbl_lamaran` (`id_lamaran`, `id_pelamar`, `id_lowongan`, `tgl_lamar`, `surat_lamaran`, `cv`, `ktp`, `kk`, `ijazah`, `trasnkrip`, `status_lamaran`) VALUES ('', '$id', '$idlowongan', '".date('Y-m-d')."', '$nama_baru', '', '', '', '', '', '')";
 $sql=mysqli_query($connect, $query);
 if ($sql) {
 	  echo "<script>alert('Data Lamaran Anda Berhasil Dikirim, Silahkan Upload Berkas Persyaratan Lamaran.');
 	  document.location.href='dashboard_pelamar.php?p=lamaran&id=".$idlowongan."'</script>\n";
 }else{
 	 echo "<script>alert('Data Lamaran Anda Gagal Dikirim.');
 	  document.location.href='dashboard_pelamar.php?p=data_lamaran&id=".$idlowongan."'</script>\n";
 }
} else{
	 echo "<script>alert('Surat Lamaran Anda Gagal Diupload.');
 	  document.location.href='dashboard_pelamar.php?p=data_lamaran&id=".$idlowongan."'</script>\n";
}
?>
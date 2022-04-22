<?php
include"koneksi.php";

$id = $_GET['id'];
$judul = $_POST['judul'];

$query2="INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `judul`, `tgl_upload`) VALUES ('$id', '$judul', '".date('Y-m-d')."')";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        echo "<script>alert('Syarat Pendaftaran Baru Berhasil Disimpan.');
        document.location.href='dashboard_panitia.php?p=data_pendaftaran'</script>\n";
      }else{
        echo "<script>alert('Syarat Pendaftaran Gagal Disimpan !');
        document.location.href=dashboard_panitia.php?p=input_pendaftaran'</script>\n";
      }

?>
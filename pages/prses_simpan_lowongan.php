<?php
include"koneksi.php";

$id = $_GET['id'];
$judul = $_POST['judul'];

$query2="INSERT INTO `tbl_lowongan` (`id_lowongan`, `judul`, `tgl_upload`) VALUES ('$id', '$judul', '".date('Y-m-d')."')";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        echo "<script>alert('Lowongan Kerja Baru Berhasi Disimpan.');
        document.location.href='dashboard_hrd.php?p=data_lowongan'</script>\n";
      }else{
        echo "<script>alert('Lowongan Kerja Gagal Disimpan !');
        document.location.href=dashboard_hrd.php?p=input_lowongan'</script>\n";
      }

?>
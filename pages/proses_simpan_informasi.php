<?php
include"koneksi.php";

$deskripsi = $_POST['deskripsi'];
$tglm = $_POST['tglm'];
$tgl = $_POST['tgl'];
$tempat = $_POST['tempat'];
$jam = $_POST['jam'];
$syarat = $_POST['syarat'];
$query2="INSERT INTO `tbl_informasi` (`id_informasi`, `deskripsi`, `tgl_mulai`, `tgl_akhir`, `jam_interview`, `tempat_interview`, `syarat`, `aktif`) VALUES ('', '$deskripsi', '$tgl', '$tglm', '$jam', '$tempat', '$syarat', 'no')";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        echo "<script>alert('Informasi Interview Berhasil Disimpan.');
        document.location.href='dashboard_hrd.php?p=input_informasi_interview'</script>\n";
      }else{
        echo "<script>alert(Informasi Interview Gagal Disimpan!');
        document.location.href=dashboard_hrd.php?p=input_informasi_interview'</script>\n";
      }
?>
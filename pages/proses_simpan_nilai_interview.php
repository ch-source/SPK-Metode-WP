<?php
include"koneksi.php";

$id = $_POST['pelamar'];
$nilai = $_POST['nilai'];
$status = $_POST['status'];

$query2="INSERT INTO `tbl_nilai_interview` (`id_nilai_interview`, `id_lamaran`, `nilai_interview`, `status`) VALUES ('', '$id', '$nilai', '$status')";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
      	$query3=mysqli_query($connect, "UPDATE tbl_lamaran SET status_interview='$status' WHERE id_lamaran='$id'");
        echo "<script>alert('Nilai Interview Berhasil Disimpan');
        document.location.href='dashboard_hrd.php?p=aspek_interview'</script>\n";
      }else{
      echo "<script>alert('Nilai Interview Gagal Disimpan');
        document.location.href='dashboard_hrd.php?p=aspek_interview'</script>\n";
      }
    
?>
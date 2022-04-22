<?php
include"koneksi.php";

$id = $_GET['id'];
$idnilai = $_GET['idnilai'];
$nilai = $_POST['nilai'];
$status = $_POST['status'];

$query2="UPDATE tbl_nilai_interview SET nilai_interview='$nilai', status='$status' WHERE  	id_nilai_interview='$idnilai'";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
      	$query3=mysqli_query($connect, "UPDATE tbl_lamaran SET status_interview='$status' WHERE id_lamaran='$id'");
        echo "<script>alert('Nilai Interview Berhasil Diubah');
        document.location.href='dashboard_hrd.php?p=aspek_interview'</script>\n";
      }else{
      echo "<script>alert('Nilai Interview Gagal Diubah');
        document.location.href='dashboard_hrd.php?p=edit_nilai_interview&idnilai=".$idnilai."&id=".$id."&nilai=".$nilai."&status=".$status."'</script>\n";
      }
    
?>
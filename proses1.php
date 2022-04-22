<?php
include"koneksi.php";
    $idlamaran=$_GET["idlamaran"];
    $pilihan=$_POST["pilihan"];
            
            
$query_pelamar="SELECT * FROM tbl_lamaran WHERE id_lamaran='$idlamaran'";
$sql_pelamar=mysqli_query($connect, $query_pelamar);
$data_pelamar=mysqli_fetch_array($sql_pelamar);
$result=mysqli_query($connect, "select * from tbl_soal WHERE id_lowongan='".$data_pelamar['id_lowongan']."'");
$jumlah_soal=mysqli_num_rows($result);
            

$query2="INSERT INTO `tbl_score_akhir` (`id_pelamar`, `id_lowongan`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `tgl_test` , `total`) VALUES ('".$data_pelamar['id_pelamar']."', '".$data_pelamar['id_lowongan']."', '$pilihan', '', '', '', '', '', '".date('Y-m-d')."', '$pilihan')";
      		$sql2=mysqli_query($connect, $query2);
      		if ($sql2) {
              header("location:dashboard_pelamar.php?p=soal2");
          }else{
              header("location:dashboard_pelamar.php?p=soal1");
          }
     ?>
<?php
include"koneksi.php";
    $idlamaran=$_GET["idlamaran"];
    $pilihan=$_POST["pilihan"];
            
            
$query_pelamar="SELECT * FROM tbl_lamaran WHERE id_lamaran='$idlamaran'";
$sql_pelamar=mysqli_query($connect, $query_pelamar);
$data_pelamar=mysqli_fetch_array($sql_pelamar);
$result=mysqli_query($connect, "select * from tbl_soal WHERE id_lowongan='".$data_pelamar['id_lowongan']."'");
$jumlah_soal=mysqli_num_rows($result);

$query="SELECT * FROM tbl_score_akhir WHERE id_pelamar='".$data_pelamar['id_pelamar']."'";
$sql=mysqli_query($connect, $query);
$data=mysqli_fetch_array($sql);
$score=$data['total'] + $pilihan;
            

$query2="UPDATE tbl_score_akhir SET c3='$pilihan', total='$score' WHERE id_pelamar='".$data['id_pelamar']."'";
      		$sql2=mysqli_query($connect, $query2);
      		if ($sql2) {
              header("location:dashboard_pelamar.php?p=soal4");
          }else{
              header("location:dashboard_pelamar.php?p=soal3");
          }
     ?>
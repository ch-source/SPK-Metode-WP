<?php
include"koneksi.php";

$id = $_GET['id'];

$query2="UPDATE tbl_informasi SET aktif='no' WHERE id_informasi='$id'";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        header("location:dashboard_hrd.php?p=input_informasi_interview");
      }else{
       header("location:dashboard_hrd.php?p=input_informasi_interview");
      }
    
?>
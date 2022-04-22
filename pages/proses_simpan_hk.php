<?php
include"koneksi.php";
$idl=$_POST['idl'];
$idp=$_POST['idp'];
$nama=$_POST['nama'];
$periode=$_POST['periode'];
$tahun=$_POST['tahun'];
$tgl=$_POST['tgl'];
$vs=$_POST['vs'];
$rangking=$_POST['rangking'];
$status=$_POST['status'];

$count=count($idp);
$sql="INSERT INTO `tbl_hasil_seleksi` (`id_seleksi`, `id_pelamar`, `nama_pelamar`, `id_lowongan`, `periode`, `tahun`, `tanggal`, `vektor_s`, `rangking`, `status_seleksi`) VALUES ";
for ($i=0; $i <$count ; $i++) { 
  $sql.="('', '{$idp[$i]}', '{$nama[$i]}', '{$idl[$i]}', '{$periode[$i]}', '{$tahun[$i]}', '{$tgl[$i]}', '{$vs[$i]}', '{$rangking[$i]}', '{$status[$i]}')";
  $sql.=",";
}

$sql=rtrim($sql,",");
      $insert=$connect->query($sql);
      if (!$insert) {
        echo "<script>alert('Opss!, Data Hasil Seleksi Gagal Disimpan');
        document.location.href='dashboard_hrd.php?p=input_hk'</script>\n";
      }else{
      echo "<script>alert('Data Hasil Seleksi Berhasil Disimpan');
        document.location.href='dashboard_hrd.php?p=data_seleksi'</script>\n"; 
      }
?>
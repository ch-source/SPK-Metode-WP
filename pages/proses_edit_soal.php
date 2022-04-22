<?php 
include"koneksi.php";

$id=$_GET['id'];
$lowongan = $_POST['lowongan'];
$kriteria = $_POST['kriteria'];
$pil_a = $_POST['pil_a'];
$pil_b = $_POST['pil_b'];
$pil_c = $_POST['pil_c'];
$pil_d = $_POST['pil_d'];
$pil_e = $_POST['pil_e'];

$query_produk = "SELECT * FROM tbl_soal WHERE id_soal='".$id."'";
$sql_produk = mysqli_query($connect, $query_produk); 
$data_produk = mysqli_fetch_array($sql_produk);
    $query="UPDATE tbl_soal SEt id_kriteria='$lowongan', nama_kriteria='$kriteria', a='$pil_a', b='$pil_b', c='$pil_c', d='$pil_d', e='$pil_e' WHERE id_soal='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
      echo "<script>alert('Data Soal Seleksi Berhasil Diubah');
      document.location.href='dashboard_hrd.php?p=data_soal'</script>\n";
    }else{
      echo "<script>alert('Data Soal Seleksi Gagal Diubah!');
      document.location.href='dashboard_hrd.php?p=edit_soal&id=".$id."'</script>\n";
    }
?>
<?php
include"koneksi.php";
$id = $_GET['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$jk = $_POST['jk'];
$email = $_POST['email'];
$pend = $_POST['pend'];

$query_a="UPDATE tbl_pelamar SET nama_pelamar='$nama', alamat_pelamar='$alamat', telepon_pelamar='$telepon', jk_pelamar='$jk', email_pelamar='$email', pendidkan_terakhir_pelamar='$pend' WHERE id_pelamar='$id'";
$sql_a=mysqli_query($connect, $query_a);
if ($sql_a) {
  $query_b="UPDATE tbl_user SET nama_user='$nama' WHERE id_pelamar='$id'";
  $sql_b=mysqli_query($connect, $query_b);
  if ($sql_b) {
    echo "<script>alert('Biodata Anda Berhasil Diubah, Silahkan Login Lagi');
    document.location.href='login.php'</script>\n";
  }else{
    echo "<script>alert('Biodata Anda Gagal Diubah!');
    document.location.href=dashboard_pelamar.php?p=edit_biodata&=".$id."'</script>\n";
  }
}
?>
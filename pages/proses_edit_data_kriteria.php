<?php 
include"koneksi.php";
$id = $_GET['id'];
$nama = $_POST['nama'];
$bobot = $_POST['bobot'];

    $query="UPDATE tbl_kriteria SEt nama_kriteria='$nama', benefit='$bobot' WHERE id_kriteria='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
      echo "<script>alert('Data Kriteria Berhasil Diubah');
      document.location.href='dashboard_hrd.php?p=data_kriteria'</script>\n";
    }else{
      echo "<script>alert('Data Kriteria Gagal Diubah!');
      document.location.href='dashboard_hrd.php?p=edit_data_kriteria&id=".$id."'</script>\n";
    }
?>

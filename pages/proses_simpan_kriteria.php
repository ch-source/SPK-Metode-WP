<?php
include "koneksi.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$bobot = $_POST['bobot'];
$query1 = "INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `benefit`) VALUES ('$id', '$nama', '$bobot')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
			echo "<script>alert('Proses Simpan Data Kriteria Berhasil');
                document.location.href='dashboard_hrd.php?p=data_kriteria'</script>\n";
		}else{
			echo "<script>alert('Proses Simpan Data Kriteria Gagal');
                document.location.href='dashboard_hrd.php?p=input_data_kriteria'</script>\n";
		}
?>

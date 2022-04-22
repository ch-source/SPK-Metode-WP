<?php
include"koneksi.php";
$query_user = "SELECT max(id_soal) as maxId FROM tbl_soal";
$hasil_user = mysqli_query($connect,$query_user);
$data_user = mysqli_fetch_array($hasil_user);
$iduser = $data_user['maxId'];
$noUser = (int) substr($iduser, 3, 3);
$noUser++;
$char = "SAL";
$iduser= $char . sprintf("%03s", $noUser);

$lowongan = $_POST['lowongan'];
$kriteria = $_POST['kriteria'];
$pil_a = $_POST['pil_a'];
$pil_b = $_POST['pil_b'];
$pil_c = $_POST['pil_c'];
$pil_d = $_POST['pil_d'];
$pil_e = $_POST['pil_e'];


$query="INSERT INTO `tbl_soal` (`id_soal`, `id_kriteria`, `nama_kriteria`, `a`, `b`, `c`, `d`, `e`) VALUES ('$iduser', '$lowongan', '$kriteria', '$pil_a', '$pil_b', '$pil_c', '$pil_d', '$pil_e')";
		$sql=mysqli_query($connect, $query);
		if ($sql) {
			echo "<script>alert('Data Soal Seleksi Berhasil Disimpan');
			document.location.href='dashboard_hrd.php?p=data_soal'</script>\n";
		}else{
			echo "<script>alert('Data Soal Seleksi Gagal Disimpan');
			document.location.href='dashboard_hrd.php?p=input_soal'</script>\n";
		}
?>
<?php
include"koneksi.php";
$query_user = "SELECT max(id_user) as maxId FROM tbl_user";
$hasil_user = mysqli_query($connect,$query_user);
$data_user = mysqli_fetch_array($hasil_user);
$iduser = $data_user['maxId'];
$noUser = (int) substr($iduser, 3, 3);
$noUser++;
$char = "USR";
$iduser= $char . sprintf("%03s", $noUser);

$query_a = "SELECT max(id_pelamar) as maxId FROM tbl_pelamar";
$hasil_a = mysqli_query($connect,$query_a);
$data_a = mysqli_fetch_array($hasil_a);
$id_a = $data_a['maxId'];
$no_a = (int) substr($id_a, 3, 3);
$no_a++;
$char = "PLM";
$id_a= $char . sprintf("%03s", $no_a);

$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$email = $_POST['email'];
$password = $_POST['password'];
$cek = mysqli_query($connect, "SELECT * FROM tbl_user WHERE email_user = '$email'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
if ($result > 0) {
   echo "<script>alert('Proses Registrasi Gagal!, Email Yang Anda Masukkan Sudah Digunakan Oleh User Lain, Masukkan Email Yang Berbeda');
    document.location.href='registrasi.php'</script>\n";
}else if ($result ==0) {
      $query2="INSERT INTO `tbl_user` (`id_user`, `id_pelamar`, `nama_user`, `telepon_user`, `email_user`, `username`, `password`, `level`, `tgl_registrasi`, `status_user`) VALUES ('$iduser', '$id_a', '$nama', '$notelp', '$email', '$email', '$password', 'Pelamar', '".date('Y-m-d')."', '')";
           $sql2=mysqli_query($connect, $query2);
           if ($sql2) {
            $query_a="INSERT INTO `tbl_pelamar` (`id_pelamar`, `nama_pelamar`, `alamat_pelamar`, `telepon_pelamar`, `jk_pelamar`, `email_pelamar`, `pendidkan_terakhir_pelamar`) VALUES ('$id_a', '$nama', '', '$notelp', '', '$email', '')";
            $sql_a=mysqli_query($connect, $query_a);
            if ($sql_a) {
              header("location:registrasi.php?notif=-regis-berhasil");
              }else{
                echo "<script>alert('Proses Registrasi Gagal!');
                document.location.href=registrasi.php'</script>\n";
           }
        }
      }
?>
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


$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$username = $_POST['username'];
$password = $_POST['password'];
$cek = mysqli_query($connect, "SELECT * FROM tbl_user WHERE username = '$username'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
if ($result > 0) {
   echo "<script>alert('Proses Registrasi Gagal!, Username Yang Anda Masukkan Sudah Digunakan, Masukkan Username Yang Berbeda');
    document.location.href='dashboard_panitia.php?p=input_user'</script>\n";
}else if ($result ==0) {
      $query2="INSERT INTO `tbl_user` (`id_user`, `id_siswa`, `nama_user`, `telepon_user`, `email_user`, `username`, `password`, `level`, `tgl_registrasi`, `status_user`) VALUES ('$iduser', '', '$nama', '$telepon', '$email', '$username', '$password', '$jabatan', '".date('Y-m-d')."', '')";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        echo "<script>alert('User Baru Berhasil Ditambahkan.');
        document.location.href='dashboard_panitia.php?p=data_users'</script>\n";
      }else{
        echo "<script>alert('Data User Gagal Disimpan !');
        document.location.href=dashboard_panitia.php?p=input_user'</script>\n";
      }
    }
?>
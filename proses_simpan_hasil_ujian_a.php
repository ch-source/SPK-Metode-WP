<?php
include"koneksi.php";

       if(isset($_POST['submit'])){
       		$idlamaran=$_GET["idlamaran"];
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($connect, "select * from tbl_soal where id_soal='$nomor' and jawaban='$jawaban'");
                    
                    $cek=mysqli_num_rows($query);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                 $query_pelamar="SELECT * FROM tbl_lamaran WHERE id_lamaran='$idlamaran'";
	              $sql_pelamar=mysqli_query($connect, $query_pelamar);
	              $data_pelamar=mysqli_fetch_array($sql_pelamar);
                $result=mysqli_query($connect, "select * from tbl_soal WHERE id_lowongan='".$data_pelamar['id_lowongan']."'");
                $jumlah_soal=mysqli_num_rows($result);
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score,1);
            }
        }

        if ($hasil<=60) {
        	$status="Tidak Lulus";
        }else{
        	$status="Lulus";
        }
     
        	$query2="INSERT INTO `tbl_hasil_seleksi` (`id_seleksi`, `id_pelamar`, `id_lowongan`, `jumlah_soal`, `benar`, `salah`, `tidak_menjawab`, `score`, `hasil`, `tgl_test` , `status_seleksi`) VALUES ('', '".$data_pelamar['id_pelamar']."', '".$data_pelamar['id_lowongan']."', '$jumlah_soal', '$benar', '$salah', '$kosong', '$score', '$hasil', '".date('Y-m-d')."', '$status')";
      		$sql2=mysqli_query($connect, $query2);
      		if ($sql2) {
      			$query3="UPDATE tbl_lamaran SET status_lamaran='Sudah Mengikuti Seleksi' WHERE id_lamaran='$idlamaran'";
      			$sql3=mysqli_query($connect, $query3);
      			if ($sql3) {

              $periode="".date('m')."";
              $tahun="".date('Y')."";

              $cek_a = mysqli_query($connect, "SELECT * FROM tbl_grafik WHERE periode = '$periode' AND tahun = '$tahun'");
              $result_a = mysqli_num_rows($cek_a);
              $data_a = mysqli_fetch_array($cek_a);
              if ($result_a > 0) {
                $lulus=1+$data_a['lulus'];
                $tidaklulus=1+$data_a['tidak_lulus'];
                if ($status=='Lulus') {
                  $query_b="UPDATE tbl_grafik SET lulus='$lulus' WHERE periode ='$periode' AND tahun = '$tahun'";
                  $sql_b=mysqli_query($connect, $query_b);
                  if ($sql_b) {
                    echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }else{
                      echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }
                }elseif($status=='Tidak Lulus'){
                   $query_c="UPDATE tbl_grafik SET tidak_lulus='$tidaklulus' WHERE periode ='$periode' AND tahun = '$tahun'";
                  $sql_c=mysqli_query($connect, $query_c);
                  if ($sql_c) {
                    echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }else{
                      echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }
                }
              }elseif ($result_a ==0) {
                if ($status=='Lulus') {
                  $query_b="INSERT INTO tbl_grafik (id_grafik, periode, tahun, lulus, tidak_lulus) VALUES ('', '$periode', '$tahun', '1', '')";
                  $sql_b=mysqli_query($connect, $query_b);
                  if ($sql_b) {
                    echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }else{
                      echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }
                
                }elseif ($status=='Tidak Lulus') {
                   $query_c="INSERT INTO tbl_grafik (id_grafik, periode, tahun, lulus, tidak_lulus) VALUES ('', '$periode', '$tahun', '', '1')";
                  $sql_c=mysqli_query($connect, $query_c);
                  if ($sql_c) {
                    echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }else{
                      echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
                      document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
                    }
                }
              }
      			}else{
        			echo "<script>alert('Terima Kasih, Anda Sudah Mengikuti Seleksi Tahap Pertama, Silahkan Lihat Nilai Anda.');
        			document.location.href='dashboard_pelamar.php?p=data_soal'</script>\n";
        		}
        	}
     ?>
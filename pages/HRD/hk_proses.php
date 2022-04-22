      <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Proses Hasil Seleksi</h6>
            </div>
          <div class="card-body" style="overflow: auto;">
           <table class="table table-bordered" style="font-size: 12px;" id="nilai">
            <thead>
              <th>No</th>
              <th>Lowongan</th>
              <th>ID Pelamar-Nama</th>
              <th>Tanggal</th>
              <th>P/T</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>Vektor S</th>
              <th>Perankingan</th>
              <th>Status</th>
            </thead>
            <tbody>
            
          <?php
          if (isset($_POST['id_pelamar'])) {
                include"koneksi.php";
                $no=1;
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_pelamar'] as $value) {
              $cek_a = mysqli_query($connect, "SELECT * FROM tbl_score_akhir WHERE id_pelamar = '$value' ORDER BY rangking DESC");
                $result_a = mysqli_num_rows($cek_a);
                $data_a = mysqli_fetch_array($cek_a);

                $cek_b = mysqli_query($connect, "SELECT * FROM tbl_lowongan WHERE id_lowongan = '".$data_a['id_lowongan']."'");
                $result_b = mysqli_num_rows($cek_b);
                $data_b = mysqli_fetch_array($cek_b);
                  
                  $query="SELECT * FROM tbl_pelamar WHERE id_pelamar='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<tr>";
                    echo"<td>".$no."</td>";
                    echo"<td>".$data_a['id_lowongan']."-".$data_b['judul']."</td>";
                    echo"<td>".$data_a['id_pelamar']."-".$data['nama_pelamar']."</td>";
                    echo"<td>".date('Y-m-d')."</td>";
                    echo"<td>".$periode."/".$tahun."</td>";
                    echo"<td>".$data_a['c1']."</td>";
                    echo"<td>".$data_a['c2']."</td>";
                    echo"<td>".$data_a['c3']."</td>";
                    echo"<td>".$data_a['c4']."</td>";
                    echo"<td>".$data_a['c5']."</td>";
                    echo"<td>".$data_a['c6']."</td>";


                  $sql_a="SELECT * FROM tbl_score_akhir WHERE id_pelamar='$value' AND id_lowongan='".$data_a['id_lowongan']."'";
                    $hasil_a=mysqli_query($connect,$sql_a);
                    $row_a=mysqli_fetch_array($hasil_a);
                    $c1p=$row_a['c1'];
                    $c2p=$row_a['c2'];
                    $c3p=$row_a['c3'];
                    $c4p=$row_a['c4'];
                    $c5p=$row_a['c5'];
                    $c6p=$row_a['c6'];

                    $total=pow($c1p, 0.217) * pow($c2p, 0.217) * pow($c3p, 0.173) * pow($c4p, 0.13) * pow($c5p, 0.13) * pow($c6p, 0.13);

                    echo"<td>".$total."</td>";

                    $query_x="UPDATE tbl_score_akhir SET vs='$total' WHERE id_pelamar='$value' AND id_lowongan='".$data_a['id_lowongan']."'";
                    $sql_x=mysqli_query($connect, $query_x);

                    $sql_c="SELECT SUM(vs) as total_vs FROM tbl_score_akhir";
                    $hasil_c=mysqli_query($connect,$sql_c);
                    $row_c=mysqli_fetch_array($hasil_c);
                    $total_vs=$row_c['total_vs'];

                    $ranking=$total / $total_vs;

                    echo"<td>".$ranking."</td>";

                    $query_y="UPDATE tbl_score_akhir SET rangking='$ranking' WHERE id_pelamar='$value' AND id_lowongan='".$data_a['id_lowongan']."'";
                    $sql_y=mysqli_query($connect, $query_y);

                    if ($no==1) {
                      $status='Lulus';
                      echo"<td>".$status."</td>";
                    }else{
                       $status='Tidak Lulus';
                      echo"<td>".$status."</td>";
                    }

                    $cek_c = mysqli_query($connect, "SELECT * FROM tbl_grafik WHERE periode = '$periode' AND tahun = '$tahun'");
                    $result_c = mysqli_num_rows($cek_c);
                    $data_c = mysqli_fetch_array($cek_c);
                    if ($result_c > 0) {
                      $lulus=1+$data_c['lulus'];
                      $tidaklulus=1+$data_c['tidak_lulus'];
                      if ($status=='Lulus') {
                        $query_e="UPDATE tbl_grafik SET lulus='$lulus' WHERE periode ='$periode' AND tahun = '$tahun'";
                        $sql_e=mysqli_query($connect, $query_e);
                        
                      }elseif($status=='Tidak Lulus'){
                         $query_d="UPDATE tbl_grafik SET tidak_lulus='$tidaklulus' WHERE periode ='$periode' AND tahun = '$tahun'";
                        $sql_d=mysqli_query($connect, $query_d);
                        
                      }
                    }elseif ($result_c ==0) {
                      if ($status=='Lulus') {
                        $query_e="INSERT INTO tbl_grafik (id_grafik, periode, tahun, lulus, tidak_lulus) VALUES ('', '$periode', '$tahun', '1', '')";
                        $sql_e=mysqli_query($connect, $query_e);

                      }elseif ($status=='Tidak Lulus') {
                         $query_d="INSERT INTO tbl_grafik (id_grafik, periode, tahun, lulus, tidak_lulus) VALUES ('', '$periode', '$tahun', '', '1')";
                        $sql_d=mysqli_query($connect, $query_d);
                        
                      }
                    }else{

                    }
                                          
                    echo"</tr>";
                    
                    
                  $no++;
                    
                  }
                
              }
            }else{
              echo "<script>alert('Opss!, Pelamar Belum Dipilih');
              document.location.href='dashboard_hrd.php?p=data_seleksi'</script>\n";
            }
          }
      ?>
    </tbody>
  </table>

            <form method='post' action='proses_simpan_hk.php'>
              <div class="box-body" style="height:10px; overflow: auto;">
          <?php
          if (isset($_POST['id_pelamar'])) {
                include"koneksi.php";
                $no=1;
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_pelamar'] as $value) {
                  $cek_a = mysqli_query($connect, "SELECT * FROM tbl_score_akhir WHERE id_pelamar = '$value' ORDER BY rangking DESC");
                $result_a = mysqli_num_rows($cek_a);
                $data_a = mysqli_fetch_array($cek_a);

                $cek_b = mysqli_query($connect, "SELECT * FROM tbl_lowongan WHERE id_lowongan = '".$data_a['id_lowongan']."'");
                $result_b = mysqli_num_rows($cek_b);
                $data_b = mysqli_fetch_array($cek_b);

                  $query="SELECT * FROM tbl_pelamar WHERE id_pelamar='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<div class='row'>";
                    echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>ID Lowongan</label>";
                            echo"<input type='text' name='no[]' readonly='readonly' class='form-control' value='".$no."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>ID Lowongan</label>";
                            echo"<input type='text' name='idl[]' readonly='readonly' class='form-control' value='".$data_a['id_lowongan']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>ID Pelamar</label>";
                            echo"<input type='text' name='idp[]' readonly='readonly' class='form-control' value='".$data_a['id_pelamar']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>Nama</label>";
                            echo"<input name='nama[]' type='text' readonly='readonly' class='form-control' value='".$data['nama_pelamar']."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tgl</label>";
                            echo"<input type='text' name='tgl[]' readonly='readonly' value='".date('Y-m-d')."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Periode</label>";
                          echo"<input type='text' name='periode[]' readonly='readonly' value='".$periode."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tahun</label>";
                            echo"<input type='text' name='tahun[]' readonly='readonly' value='".$tahun."' type='text' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
            
                    echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>C1</label>";
                            echo"<input type='text' name='c_1[]' readonly='readonly' class='form-control' value='".$data_a['c1']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>C2</label>";
                            echo"<input type='text' name='c_2[]' readonly='readonly' class='form-control' value='".$data_a['c2']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>C3</label>";
                            echo"<input type='text' name='c_3[]' readonly='readonly' class='form-control' value='".$data_a['c3']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>C4</label>";
                            echo"<input type='text' name='c_4[]' readonly='readonly' class='form-control' value='".$data_a['c4']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>C5</label>";
                            echo"<input type='text' name='c_5[]' readonly='readonly' class='form-control' value='".$data_a['c5']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>C6</label>";
                            echo"<input type='text' name='c_6[]' readonly='readonly' class='form-control' value='".$data_a['c6']."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      
                    $sql_a="SELECT * FROM tbl_score_akhir WHERE id_pelamar='$value' AND id_lowongan='".$data_a['id_lowongan']."'";
                    $hasil_a=mysqli_query($connect,$sql_a);
                    $row_a=mysqli_fetch_array($hasil_a);
                    $c1p=$row_a['c1'];
                    $c2p=$row_a['c2'];
                    $c3p=$row_a['c3'];
                    $c4p=$row_a['c4'];
                    $c5p=$row_a['c5'];
                    $c6p=$row_a['c6'];

                    $total=pow($c1p, 0.217) * pow($c2p, 0.217) * pow($c3p, 0.173) * pow($c4p, 0.13) * pow($c5p, 0.13) * pow($c6p, 0.13);

                    echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Vektor S</label>";
                            echo"<input type='text' name='vs[]' readonly='readonly' class='form-control' value='".$total."'>";
                          echo"</div>";
                        echo"</div>";
                    echo"</div>";

                    $sql_c="SELECT SUM(vs) as total_vs FROM tbl_score_akhir";
                    $hasil_c=mysqli_query($connect,$sql_c);
                    $row_c=mysqli_fetch_array($hasil_c);
                    $total_vs=$row_c['total_vs'];

                    $ranking=$total / $total_vs;

                    echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Perankingan</label>";
                            echo"<input type='text' name='rangking[]' readonly='readonly' class='form-control' value='".$ranking."'>";
                          echo"</div>";
                        echo"</div>";
                    echo"</div>";

                      echo"<div class='row'>";
                      if ($no==1) {
                      $status='Lulus';
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Status</label>";
                            echo"<input type='text' name='status[]' readonly='readonly' class='form-control' value='".$status."'>";
                          echo"</div>";
                        echo"</div>";
                        }else{
                        $status='Tidak Lulus';
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Status</label>";
                            echo"<input type='text' name='status[]' readonly='readonly' class='form-control' value='".$status."'>";
                          echo"</div>";
                        echo"</div>";
                        }
                      echo"</div>";
                     $no++;

                  }
                  
                }
              }else{
              echo "<script>alert('Opss!, Pelamar Belum Dipilih');
              document.location.href='dashboard_hrd.php?p=data_seleksi'</script>\n";
            }
          }
        
      ?>
       </div>
      <a href="dashboard_hrd.php?p=data_seleksi" class="btn btn-danger" style="margin-top: 15px;"><i class="fa fa-close"></i> Tutup</a>
      <button type='submit' class='btn btn-success' style="margin-top: 15px;"><i class='fa fa-save'></i> Simpan Proses Akhir</i></button>
      </form>
          </div>
         
        </div>
      </div>
     
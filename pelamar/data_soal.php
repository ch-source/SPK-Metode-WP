        <div class="span10">
          <article class="blog-post">
            <?php
            include"koneksi.php";
              $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
                if ($data['level'] == 'Pelamar') {}
                 $no=1;
                  $query_b="SELECT * FROm tbl_lamaran WHERE id_pelamar='".$data['id_pelamar']."'";
                  $sql_b=mysqli_query($connect, $query_b);
                  while ( $data_b=mysqli_fetch_array($sql_b)) {
            if ($data_b['surat_lamaran']==''||$data_b['cv']==''||$data_b['ktp']==''||$data_b['kk']==''||$data_b['ijazah']==''||$data_b['trasnkrip']==''||$data_b['cv']=='' ||$data_b['foto']=='') {
              echo "<div class='post-heading'>
                     <h3><a href='#'>Data Soal Seleksi</a></h3>
                      </div>";
                  echo"<div class='alert alert-danger alert-dismissible' style='text-align:justify;'>
                        <a style='text-decoration:none;' href='dashboard_pelamar.php?p=lamaran' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>Berkas Lamaran Anda Belum Lengkap !!</div>";
              }else if($data_b['status_lamaran']==''){
                echo "<div class='post-heading'>
                     <h3><a href='#'>Data Soal Seleksi</a></h3>
                      </div>";
                echo "<div class='alert alert-info alert-dismissible' role='alert'>
                    <h6><i class='fas fa-info'></i><b> Information</b></h6>
                    Anda Belum Mengerjakan Soal !!, Silahkan Klik Tombol<b> 'Mulai' </b> Untuk Memulai
                  </div>";
                echo "<div class='row'>";
                echo "<div class='span2'><a href='dashboard_pelamar.php?p=soal1' class='btn btn-info btn-rounded' style='margin-left: 10px;'><i class='icon icon-file'></i> Mulai</a></div>";
              echo "</div>";
            }else{
            echo "<div class='post-heading'>
                     <h3><a href='#'>Data Hasil Seleksi</a></h3>
                      </div>";
            echo "<table class='table table-bordered table-striped'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pelamar</th>
                    <th>Lowongan</th>
                    <th>Tgl. Lamar</th>
                    <th>Status</th>
                    <th>Total Score</th>
                  </tr>
                </thead>
                <tbody>";
                 
                     echo"<tr>";
                        echo"<td>".$no."</td>";
                        $query_a="SELECT * FROm tbl_pelamar WHERE id_pelamar='".$data_b['id_pelamar']."'";
                        $sql_a=mysqli_query($connect, $query_a);
                        $data_a=mysqli_fetch_array($sql_a);
                        echo"<td>".$data_b['id_pelamar']."-".$data_a['nama_pelamar']."</td>";
                        $query_pelamar="SELECT * FROm tbl_lowongan WHERE id_lowongan='".$data_b['id_lowongan']."'";
                        $sql_pelamar=mysqli_query($connect, $query_pelamar);
                        $data_pelamar=mysqli_fetch_array($sql_pelamar);
                        echo"<td>".$data_b['id_lowongan']."-".$data_pelamar['judul']."</td>";
                        echo"<td>".$data_b['tgl_lamar']."</td>";
                        echo"<td>".$data_b['status_lamaran']."</td>";
                        echo"<td>".$data_b['total_score']."</td>";
                        
                      echo"</tr>";
                      echo "</tbody>";
                      echo "</table>";
                      }
                  }
                  ?>
                  
          </article>
        </div>
        
        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Informasi Hasil Seleksi</a></h3>
            </div>
            <hr>
            <?php
              include"koneksi.php";
              $query_informasi="SELECT*FROM tbl_informasi WHERE aktif='ya'";
              $sql_informasi=mysqli_query($connect, $query_informasi);
              while($data_informasi=mysqli_fetch_array($sql_informasi)){
                
                 echo"<p>".$data_informasi['deskripsi']."</p>";
                 echo"
                      <div class='row'>
                        <div class='span2'>Tanggal</div>
                        <div class='span6'>: ".$data_informasi['tgl_mulai']." s/d ".$data_informasi['tgl_akhir']."</div>
                      </div>
                      <div class='row'>
                        <div class='span2'>Jam</div>
                        <div class='span6'>: ".$data_informasi['jam_interview']."</div>
                      </div>
                      <div class='row'>
                        <div class='span2'>Tempat</div>
                        <div class='span6'>: ".$data_informasi['tempat_interview']."</div>
                      </div>";
                      echo"<p>".$data_informasi['syarat']."</p>";
                      echo"<table class='table table-bordered'>
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Alamat</th>
                                  <th>Posisi Yang Dilamar</th>
                                </tr>
                              </thead>";
                              echo"<tbody>";
                              $no=1;
                              $query_x='SELECT * FROM tbl_hasil_seleksi WHERE status_seleksi="Lulus"';
                              $sql_x=mysqli_query($connect, $query_x);
                              while ($data_x=mysqli_fetch_array($sql_x)) {
                               echo"<tr>";
                                   echo"<td>".$no."</td>";
                                    $query_c="SELECT * FROM tbl_pelamar WHERE id_pelamar='".$data_x['id_pelamar']."'";
                                    $sql_c=mysqli_query($connect, $query_c);
                                    $data_c=mysqli_fetch_array($sql_c);
                                   echo"<td>".$data_x['id_pelamar']."-".$data_c['nama_pelamar']."</td>";
                                   echo"<td>".$data_c['jk_pelamar']."</td>";
                                   echo"<td>".$data_c['alamat_pelamar']."</td>";
                                    $query_d="SELECT * FROM tbl_lowongan WHERE id_lowongan='".$data_x['id_lowongan']."'";
                                    $sql_d=mysqli_query($connect, $query_d);
                                    $data_d=mysqli_fetch_array($sql_d);
                                   echo"<td>".$data_d['id_lowongan']."-".$data_d['judul']."</td>";
                                 echo"</tr>";
                                $no++;
                              }
                                
                              echo"</tbody>";
                            echo"</table>";
                }
                ?>
                
          </article>

        </div>
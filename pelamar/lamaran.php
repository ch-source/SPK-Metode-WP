        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Data Lamaran</a></h3>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pelamar</th>
                    <th>Lowongan</th>
                    <th>Tgl. Lamar</th>
                    <th>Satatus Lamaran</th>
                    <th>Berkas Lamaran</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                
                 $no=1;
                  $query_b="SELECT * FROm tbl_lamaran WHERE id_pelamar='".$data['id_pelamar']."'";
                  $sql_b=mysqli_query($connect, $query_b);
                  while ( $data_b=mysqli_fetch_array($sql_b)) {
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
                        if ($data_b['surat_lamaran']==''||$data_b['cv']==''||$data_b['ktp']==''||$data_b['kk']==''||$data_b['ijazah']==''||$data_b['trasnkrip']==''||$data_b['cv']=='' ||$data_b['foto']=='') {
                        echo"<td style='color:red; font-weight:bold;'>Berkas Lamaran Belum Lengkap!</td>";
                        }else{
                          echo"<td style='color:green; font-weight:bold;'>Berkas Lamaran Lengkap</td>";
                        }
                         echo"<td><a href='dashboard_pelamar.php?p=berkas_lamaran&id=".$data_b['id_lamaran']."' class='btn btn-warning btn-rounded'> Lihat Berkas</a></td>";
                      echo"</tr>";
                  }
               
                  ?>
                  </tbody>
                </table>
          </article>
        </div>
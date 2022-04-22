<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Score Akhir</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Score Akhir</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Score Akhir</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center " id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Pelamar</th>
                        <th>Lowongan</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>C6</th>
                        <th>Total Score</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_score_akhir";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <?php
                          $query_a="SELECT * FROM tbl_pelamar WHERE id_pelamar='".$data['id_pelamar']."'";
                          $sql_a=mysqli_query($connect, $query_a);
                          $data_a=mysqli_fetch_array($sql_a);
                        ?>
                        <td><?php echo $data['id_pelamar'];?>-<?php echo $data_a['nama_pelamar'];?></td>
                         <?php
                          $query_b="SELECT * FROM tbl_lowongan WHERE id_lowongan='".$data['id_lowongan']."'";
                          $sql_b=mysqli_query($connect, $query_b);
                          $data_b=mysqli_fetch_array($sql_b);
                        ?>
                        <td><?php echo $data['id_lowongan'];?>-<?php echo $data_b['judul'];?> (<?php echo $data_b['tgl_upload'];?>)</td>
                         <td><?php echo $data['c1'];?></td>
                        <td><?php echo $data['c2'];?></td>
                        <td><?php echo $data['c3'];?></td>
                         <td><?php echo $data['c4'];?></td>
                        <td><?php echo $data['c5'];?></td>
                        <td><?php echo $data['c6'];?></td>
                        <td><?php echo $data['total'];?></td>
                      </tr>
                      <?php $no++;}
                      ?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

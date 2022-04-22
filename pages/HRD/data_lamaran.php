<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Lamaran Pekerjaan</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Lamaran Pekerjaan</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Lamaran Pekerjaan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center " id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Lowongan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_lowongan";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_lowongan'];?>-<?php echo $data['judul'];?> (<?php echo $data['tgl_upload'];?>)</td>
                        <td>
                          <table class="table table-bordered" style="font-size: 12px;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Pelamar</th>
                                <th>Tgl. Lamar</th>
                                <th>Status</th>
                                <th>Berkas Lamaran</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT * FROM tbl_lamaran WHERE id_lowongan='".$data['id_lowongan']."'";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td><?php echo $no_a;?></td>
                                <?php 
                                $query_pelamar="SELECT * FROM tbl_pelamar WHERE id_pelamar='".$data_a['id_pelamar']."'";
                                $sql_pelamar=mysqli_query($connect, $query_pelamar);
                                $data_pelamar=mysqli_fetch_array($sql_pelamar);
                                ?>
                                <td><?php echo $data_a['id_pelamar'];?>-<?php echo $data_pelamar['nama_pelamar'];?></td>
                                <td><?php echo $data_a['tgl_lamar'];?></td>
                                <td><?php echo $data_a['status_lamaran'];?></td>
                                <td><a href="dashboard_hrd.php?p=berkas_lamaran&id=<?php echo $data_a['id_lamaran'];?>" class="btn btn-warning btn-sm">Berkas</a></td>
                              </tr>
                              <?php $no_a++;}?>
                            </tbody>
                          </table>
                        </td>
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

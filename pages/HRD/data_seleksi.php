<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Seleksi</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Seleksi</li>
            </ol>
          </div>
          <a href="dashboard_hrd.php?p=input_hk" class="btn btn-success" style="margin-bottom: 3px;"><i class="fa fa-edit"></i> INPUT HASIL SELEKSI</a>
          <a href="dashboard_hrd.php?p=input_informasi_interview" class="btn btn-primary" style="margin-bottom: 3px;"><i class="fa fa-edit"></i> INFORMASI INTERVIEW</a>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Seleksi</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center " id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Pelamar</th>
                        <th>Lowongan</th>
                        <th>P/T</th>
                        <th>Tgl. Test</th>
                        <th>Vektor S</th>
                        <th>Perangkingan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_hasil_seleksi ORDER BY rangking DESC";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_pelamar'];?>-<?php echo $data['nama_pelamar'];?></td>
                         <?php
                          $query_b="SELECT * FROM tbl_lowongan WHERE id_lowongan='".$data['id_lowongan']."'";
                          $sql_b=mysqli_query($connect, $query_b);
                          $data_b=mysqli_fetch_array($sql_b);
                        ?>
                        <td><?php echo $data['id_lowongan'];?>-<?php echo $data_b['judul'];?> (<?php echo $data_b['tgl_upload'];?>)</td>
                        <td><?php echo $data['periode'];?>-<?php echo $data['tahun'];?></td>
                        <td><?php echo $data['tanggal'];?></td>
                        <td><?php echo $data['vektor_s'];?></td>
                        <td><?php echo $data['rangking'];?></td>
                        <td><?php echo $data['status_seleksi'];?></td>
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

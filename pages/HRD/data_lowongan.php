<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Lowongan Pekerjaan</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Lowongan Pekerjaan</li>
            </ol>
          </div>
          <a href="dashboard_hrd.php?p=input_lowongan" class="btn btn-primary" style="margin-bottom: 3px;"><i class="fa fa-edit"></i> INPUT LOWONGAN PEKERJAAN</a>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Lowongan Pekerjaan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center " id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Tgl. Upload</th>
                        <th></th>
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
                        <td><?php echo $data['id_lowongan'];?></td>
                        <td><?php echo $data['judul'];?></td>
                        <td><?php echo $data['tgl_upload'];?></td>
                        <td>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Syarat-syarat</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT*FROM tbl_syarat_lowongan WHERE id_lowongan='".$data['id_lowongan']."'";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td><?php echo $no_a;?></td>
                                <td><?php echo $data_a['syarat'];?></td>
                              </tr>
                              <?php $no_a++;}?>
                            </tbody>
                          </table>
                        </td>
                        <td><a href="proses_hapus_lowongan.php?id=<?php echo $data['id_lowongan'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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

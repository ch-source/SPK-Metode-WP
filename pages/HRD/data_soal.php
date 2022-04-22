<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Soal Selesksi</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Soal Selesksi</li>
            </ol>
          </div>
          <a href="dashboard_hrd.php?p=input_soal" class="btn btn-primary" style="margin-bottom: 3px;"><i class="fa fa-edit"></i> INPUT SOAL</a>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Soal Seleksi</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Kriteria</th>
                        <th>Pilihan a</th>
                        <th>Pilihan b</th>
                        <th>Pilihan c</th>
                        <th>Pilihan d</th>
                        <th>Pilihan e</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_soal";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_soal'];?></td>
                        <td><?php echo $data['nama_kriteria'];?></td>
                        <td><?php echo $data['a'];?></td>
                        <td><?php echo $data['b'];?></td>
                        <td><?php echo $data['c'];?></td>
                        <td><?php echo $data['d'];?></td>
                        <td><?php echo $data['e'];?></td>
                        <td><a href="dashboard_hrd.php?p=edit_soal&id=<?php echo $data['id_soal'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
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

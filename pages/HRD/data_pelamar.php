<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Pelamar</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pelamar</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pelamar</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>JK</th>
                        <th>Email</th>
                        <th>Pendidikan</th>
                        <th>Status Data</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_pelamar";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_pelamar'];?></td>
                        <td><?php echo $data['nama_pelamar'];?></td>
                        <td><?php echo $data['telepon_pelamar'];?></td>
                        <td><?php echo $data['alamat_pelamar'];?></td>
                        <td><?php echo $data['jk_pelamar'];?></td>
                        <td><?php echo $data['email_pelamar'];?></td>
                        <td><?php echo $data['pendidkan_terakhir_pelamar'];?></td>
                        <?php
                          $query_a="SELECT*FROM tbl_user WHERE id_pelamar='".$data['id_pelamar']."'";
                          $sql_a=mysqli_query($connect, $query_a);
                          $data_a=mysqli_fetch_array($sql_a);
                        ?>
                        <td><?php echo $data_a['status_user'];?></td>
                        <td><?php 
                        if (  $data_a['status_user']=='') {
                        echo"<a href='proses_validasi_user.php?id=".$data_a['id_user']."' class='btn btn-success btn-sm'>Validasi</a>";
                        }else{
                          echo"";
                        }
                      
                        ?>
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
        <!---Container Fluid-->
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Users</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Users</li>
            </ol>
          </div>

          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Users</h6>
                </div>
                <div class="card-body">
                  <a href="dashboard_hrd.php?p=input_user" class="btn btn-primary"><i class="fa fa-plus"></i> TAMBAH USER</a>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_user";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_user'];?></td>
                        <td><?php echo $data['nama_user'];?></td>
                        <td><?php echo $data['telepon_user'];?></td>
                        <td><?php echo $data['email_user'];?></td>
                        <td><?php echo $data['level'];?></td>
                        <td><?php echo $data['username'];?></td>
                        <?php if ($data['level']=='Pelamar'){
                          echo"<td></td>";
                        }else{
                          echo"<td><a href='dashboard_hrd.php?p=edit_user&id=".$data['id_user']."' class='btn btn-success btn-sm'><i class='fa fa-edit'></i></a>
                        </td>";
                        }?>
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
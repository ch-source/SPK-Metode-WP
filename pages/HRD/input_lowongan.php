<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Lowongan Pekerjaan</h6>
                </div>
                <div class="card-body">
                  <?php
                    include"koneksi.php";
                    $query_user = "SELECT max(id_lowongan) as maxId FROM tbl_lowongan";
                    $hasil_user = mysqli_query($connect,$query_user);
                    $data_user = mysqli_fetch_array($hasil_user);
                    $iduser = $data_user['maxId'];
                    $noUser = (int) substr($iduser, 3, 3);
                    $noUser++;
                    $char = "LWG";
                    $iduser= $char . sprintf("%03s", $noUser);
                  ?>
                  <form method="post" action="proses_add_deskripsi.php">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Lowongan</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" value="<?php echo $iduser;?>" name="id" readonly="readonly">
                      </div>
                    
                      <label class="col-sm-2 col-form-label">Deskripsi Lowongan</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="deskripsi" required="required">
                      </div>
                    
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Tambahkan</button>
                      </div>
                    </div>
                  </form>
                  <hr>
                  <form method="post" action="prses_simpan_lowongan.php?id=<?php echo $iduser;?>">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="judul" required="required">
                      </div>
                    <div class="col-sm-6">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Deskripsi</th>
                              <th>Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include"koneksi.php";
                            
                            $query="SELECT*FROM tbl_syarat_lowongan WHERE id_lowongan='$iduser'";
                            $sql=mysqli_query($connect, $query);
                            while($data=mysqli_fetch_array($sql)) {?>
                            <tr>
                              <td><?php echo $data['syarat'];?></td>
                              <td style="text-align: center;">
                                <a href="dashboard_hrd.php?p=edit_deskripsi&id=<?php echo $data['id_syarat'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> <a href="proses_hapus_deskripsi.php?id=<?php echo $data['id_syarat'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php }
                            ?>
                          </tbody>
                        </table>
                         <button type="submit" class="btn btn-success" style="margin-top: 5px;"><i class="fa fa-save"></i> Simpan Lowongan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
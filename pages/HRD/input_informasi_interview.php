<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Informasi Interview</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_informasi.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="deskripsi" required="required"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Mulai</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Tgl. Selesai</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="tglm" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jam Interview</label>
                      <div class="col-sm-10">
                        <input type="time" class="form-control" name="jam" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tempat Interview</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempat" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Informasi Lain</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="syarat" required="required">
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Informasi</button>
                      </div>
                    </div>
                  </form>
                  <hr>
                   <div class="table-responsive p-3">
                  <table class="table align-items-center table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Tgl. Interview</th>
                        <th>Jam Interview</th>
                        <th>Tempat Interview</th>
                        <th>Info Tambahan</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_informasi";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['deskripsi'];?></td>
                        <td><?php echo $data['tgl_mulai'];?> s/d <?php echo $data['tgl_akhir'];?></td>
                        <td><?php echo $data['jam_interview'];?></td>
                        <td><?php echo $data['tempat_interview'];?></td>
                        <td><?php echo $data['syarat'];?></td>
                        <td>
                          <?php if ($data['aktif']=='no'){
                            echo"<a href='proses_aktif_informasi.php?id=".$data['id_informasi']."' class='btn btn-success btn-sm'>Aktif</a></td>";
                          }else{
                            echo"<a href='proses_nonaktif_informasi.php?id=".$data['id_informasi']."' class='btn btn-danger btn-sm'>Nonaktif</a></td>";
                          }?>
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
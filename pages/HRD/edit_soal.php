<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Pilihan Kriteria</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query_a="SELECT * FROM tbl_soal WHERE id_soal='$id'";
                  $sql_a=mysqli_query($connect, $query_a);
                  $data_a=mysqli_fetch_array($sql_a);?>
                   <form method="post" action="proses_edit_soal.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilih Kriteria</label>
                      <div class="col-sm-10">
                        <select name="lowongan" class="form-control"  autofocus="autofocus" onchange="changeValueNIM(this.value)" required="required">
                          <option value="" selected="selected">-Pilih Kriteria-</option>
                          <?php 
                               $sql=mysqli_query($connect, "SELECT * FROM tbl_kriteria");
                               $jsArray = "var prdName = new Array();\n";
                               while ($data=mysqli_fetch_array($sql)) {
                              
                                echo '<option value="'.$data['id_kriteria'].'">'.$data['id_kriteria'].'-'.$data['nama_kriteria'].'</option> ';
                                $jsArray .= "prdName['" . $data['id_kriteria'] . "'] = {nama_kriteria:'" . addslashes($data['nama_kriteria']) . "'};\n";
                              
                               }
                              ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" ass="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data_a['nama_kriteria'];?>" id="nama_kriteria" name="kriteria" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilihan A</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_a['a'];?>" name="pil_a" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilihan B</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo $data_a['b'];?>" class="form-control" name="pil_b" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilihan C</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo $data_a['c'];?>" class="form-control" name="pil_c" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilihan D</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_a['d'];?>" name="pil_d" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilihan E</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_a['e'];?>" name="pil_e" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        <a href="dashboard_hrd.php?p=data_soal" class="btn btn-danger"><i class="fa fa-close"></i>Batal</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
        <script type="text/javascript" src="./query_java.js"></script>
        <script type="text/javascript">    
        <?php echo $jsArray; ?>  
        function changeValueNIM(x){  
        document.getElementById('nama_kriteria').value = prdName[x].nama_kriteria;  
        };
        </script>
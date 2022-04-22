<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Laporan Hasil Seleksi</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Hasil Seleksi</li>
            </ol>
          </div>
            <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title">Laporan Hasil Seleksi</b>
                </div>
                <div class="card-body">
                   <form method="post"action="laporan/laporan_seleksi.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Periode</label>
                      <div class="col-sm-3">
                        <select name="periode" class="form-control" required="required">
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                        </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Tahun</label>
                      <div class="col-sm-3">
                         <select name="tahun" class="form-control">
                                                  <?php
                                                  $mulai= date('Y') - 50;
                                                  for($i = $mulai; $i<$mulai + 100;$i++){
                                                  $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                  echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                  }
                                                  ?>
                                              </select>
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Cetak </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Hasil Seleksi</h6>
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

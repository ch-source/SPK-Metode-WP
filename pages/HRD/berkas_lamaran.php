<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Berkas Lamaran</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query="SELECT * FROM tbl_lamaran WHERE id_lamaran='$id'";
                  $sql=mysqli_query($connect, $query);
                  $data=mysqli_fetch_array($sql);
                  ?>
                  <?php
              if($data['surat_lamaran']==''|| $data['cv']=='' || $data['ktp']==''|| $data['kk']==''|| $data['ijazah']==''|| $data['trasnkrip']=='' || $data['foto']==''){
                echo "<div class='alert alert-danger alert-dismissible'>
                Berkas Lamaran Pelamar Belum Lengkap!</b>
                </div>";
                echo'<div class="row">
                    <div class="col-md-12">
                       <a href="dashboard_hrd.php?p=data_lamaran" class="btn btn-danger">Tutup</a>
                    </div>
                  </div>';
                }else{
                  echo'<div class="row">
                    <div class="col-md-6" style="margin-bottom: 4px;">
                       <img src="../berkas/'. $data['foto'].'" style="width: 160px; height: 200px; border:1px solid #575d63;">
                    </div>
                    <div class="col-md-6" style="margin-bottom: 4px;">
                       <img src="../berkas/'.$data['ktp'].'" style="width: 300px; height: 200px; border:1px solid #575d63;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 4px;">
                       <embed src="../berkas/'.$data['surat_lamaran'].'" type="application/pdf" width="98%"" height="600"></embed>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 4px;">
                       <embed src="../berkas/'.$data['cv'].'" type="application/pdf" width="98%" height="600"></embed>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 4px;">
                       <embed src="../berkas/'.$data['kk'].'" type="application/pdf" width="98%" height="600"></embed>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 4px;">
                       <embed src="../berkas/'.$data['ijazah'].'" type="application/pdf" width="98%" height="600"></embed>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 4px;">
                       <embed src="../berkas/'.$data['trasnkrip'].'" type="application/pdf" width="98%" height="600"></embed>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <a href="proses_validasi_berkas.php?id='.$data['id_lamaran'].'" class="btn btn-primary"><i class="fa fa-spinner"></i> Validasi</a>
                       <a href="dashboard_hrd.php?p=data_lamaran" class="btn btn-danger">Tutup</a>
                    </div>
                  </div>';
                }?>
                  
                 </div>
                </div>
              </div>
            </div>
          </div>

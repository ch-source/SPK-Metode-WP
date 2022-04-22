        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Form Upload Berkas Lamaran</a></h3>
            </div>
            <div class="post-body">
             <?php
              
              $id=$_GET['id'];
              $query_pelamar="SELECT * FROm tbl_lamaran WHERE id_lamaran='$id'";
              $sql_pelamar=mysqli_query($connect, $query_pelamar);
              $data_pelamar=mysqli_fetch_array($sql_pelamar);
              ?>
            <?php if ($data_pelamar['foto']==''){
              echo"<form action='proses_upload_foto.php?id=".$id."' method='post' role='form' enctype='multipart/form-data' class='contactForm'>
                <div class='row'>
                  <div class='span2 form-group'>
                    <label>Foto (.jpg)</label>
                  </div>
                  <div class='span4 form-group'>
                    <input type='file' required='required' name='foto' class='form-control'/>
                  </div>
                  <div class='span4 form-group'>
                    <div class='text-left'>
                      <button class='btn btn-default btn-rounded' type='submit'><i class='icon icon-upload'></i>Upload Foto</button> 
                    </div>
                  </div>
                </div>
                </form>";
              }else{
                echo"<div class='row'>
                  <div class='span5'><b>Foto</b></div>
                </div>
                <div class='row'>
                  <div class='span5'>
                    <img src='./berkas/".$data_pelamar['foto']."' style='width: 200px; height: 260px; border:1px solid #575d63;'>
                  </div>
                </div>";
              }?>
            <?php if ($data_pelamar['ktp']==''){
              echo"<form action='proses_upload_ktp.php?id=".$id."' method='post' role='form' enctype='multipart/form-data' class='contactForm'>
                <div class='row'>
                  <div class='span2 form-group'>
                    <label>KTP (.pdf)</label>
                  </div>
                  <div class='span4 form-group'>
                    <input type='file' required='required' name='foto' class='form-control'/>
                  </div>
                  <div class='span4 form-group'>
                    <div class='text-left'>
                      <button class='btn btn-default btn-rounded' type='submit'><i class='icon icon-upload'></i>Upload KTP</button> 
                    </div>
                  </div>
                </div>
                </form>";
              }else{
                echo"<div class='row'>
                  <div class='span5'><b>Kartu Tanda Penduduk (KTP)</b></div>
                </div>
                <div class='row'>
                  <div class='span5'>
                    <img src='./berkas/".$data_pelamar['ktp']."' style='width: 700px; height: 280px; border:1px solid #575d63;'>
                  </div>
                </div>";
              }?>
            <?php if ($data_pelamar['surat_lamaran']==''){
              echo"<form action='proses_upload_sl.php?id=".$id."' method='post' role='form' enctype='multipart/form-data' class='contactForm'>
                <div class='row'>
                  <div class='span2 form-group'>
                    <label>Surat Lamaran (.pdf)</label>
                  </div>
                  <div class='span4 form-group'>
                    <input type='file' required='required' name='nama_file' class='form-control'/>
                  </div>
                  <div class='span4 form-group'>
                    <div class='text-left'>
                      <button class='btn btn-default btn-rounded' type='submit'><i class='icon icon-upload'></i>Upload Surat Lamaran</button> 
                    </div>
                  </div>
                </div>
                </form>";
              }else{
                echo"<div class='row'>
                  <div class='span10'><b>Surat Lamaran</b></div>
                </div>
                <div class='row'>
                  <div class='span10' style='text-align: center;'>
                    <embed src='./berkas/".$data_pelamar['surat_lamaran']."' type='application/pdf' width='98%' height='600'></embed>
                  </div>
                </div>";
              }?>
              <?php if ($data_pelamar['cv']==''){
              echo"<form action='proses_upload_cv.php?id=".$id."' method='post' role='form' enctype='multipart/form-data' class='contactForm'>
                <div class='row'>
                  <div class='span2 form-group'>
                    <label>Curriculum Vitae (CV) (.pdf)</label>
                  </div>
                  <div class='span4 form-group'>
                    <input type='file' required='required' name='nama_file' class='form-control'/>
                  </div>
                  <div class='span4 form-group'>
                    <div class='text-left'>
                      <button class='btn btn-default btn-rounded' type='submit'><i class='icon icon-upload'></i>Upload CV</button> 
                    </div>
                  </div>
                </div>
                </form>";
              }else{
                echo"<div class='row'>
                  <div class='span10'><b>CV</b></div>
                </div>
                <div class='row'>
                  <div class='span10' style='text-align: center;'>
                    <embed src='./berkas/".$data_pelamar['cv']."' type='application/pdf' width='98%' height='600'></embed>
                  </div>
                </div>";
              }?>
              <?php if ($data_pelamar['kk']==''){
              echo"<form action='proses_upload_kk.php?id=".$id."' method='post' role='form' enctype='multipart/form-data' class='contactForm'>
                <div class='row'>
                  <div class='span2 form-group'>
                    <label>KK (.pdf)</label>
                  </div>
                  <div class='span4 form-group'>
                    <input type='file' required='required' name='nama_file' class='form-control'/>
                  </div>
                  <div class='span4 form-group'>
                    <div class='text-left'>
                      <button class='btn btn-default btn-rounded' type='submit'><i class='icon icon-upload'></i>Upload KK</button> 
                    </div>
                  </div>
                </div>
                </form>";
              }else{
                echo"<div class='row'>
                  <div class='span10'><b>Kartu Keluarg</b></div>
                </div>
                <div class='row'>
                  <div class='span10' style='text-align: center;'>
                    <embed src='./berkas/".$data_pelamar['kk']."' type='application/pdf' width='98%' height='600'></embed>
                  </div>
                </div>";
              }?>
              <?php if ($data_pelamar['ijazah']==''){
              echo"<form action='proses_upload_ijazah.php?id=".$id."' method='post' role='form' enctype='multipart/form-data' class='contactForm'>
                <div class='row'>
                  <div class='span2 form-group'>
                    <label>Ijazah(.pdf)</label>
                  </div>
                  <div class='span4 form-group'>
                    <input type='file' required='required' name='nama_file' class='form-control'/>
                  </div>
                  <div class='span4 form-group'>
                    <div class='text-left'>
                      <button class='btn btn-default btn-rounded' type='submit'><i class='icon icon-upload'></i>Upload Ijazah</button> 
                    </div>
                  </div>
                </div>
                </form>";
              }else{
                echo"<div class='row'>
                  <div class='span10'><b>Ijazah Terakhir</b></div>
                </div>
                <div class='row'>
                  <div class='span10' style='text-align: center;'>
                    <embed src='./berkas/".$data_pelamar['ijazah']."' type='application/pdf' width='98%' height='600'></embed>
                  </div>
                </div>";
              }?>
              <?php if ($data_pelamar['trasnkrip']==''){
              echo"<form action='proses_upload_transkrip.php?id=".$id."' method='post' role='form' enctype='multipart/form-data' class='contactForm'>
                <div class='row'>
                  <div class='span2 form-group'>
                    <label>Transkrip Nilai (.pdf)</label>
                  </div>
                  <div class='span4 form-group'>
                    <input type='file' required='required' name='nama_file' class='form-control'/>
                  </div>
                  <div class='span4 form-group'>
                    <div class='text-left'>
                      <button class='btn btn-default btn-rounded' type='submit'><i class='icon icon-upload'></i>Upload Transkrip</button> 
                    </div>
                  </div>
                </div>
                </form>";
              }else{
                echo"<div class='row'>
                  <div class='span10'><b>Transkrip Nilai</b></div>
                </div>
                <div class='row'>
                  <div class='span10' style='text-align: center;'>
                    <embed src='./berkas/".$data_pelamar['trasnkrip']."' type='application/pdf' width='98%' height='600'></embed>
                  </div>
                </div>";
              }?>
               
          <a href="dashboard_pelamar.php?p=lamaran" class="btn btn-danger btn-rounded">Tutup</a>
        </div>
          </article>
        </div>
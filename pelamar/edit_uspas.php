        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Form Edit Username & Password</a></h3>
              <?php
              include"koneksi.php";
              $id=$_GET['id'];
              $query_pelamar="SELECT * FROm tbl_user WHERE id_user='$id'";
              $sql_pelamar=mysqli_query($connect, $query_pelamar);
              $data_pelamar=mysqli_fetch_array($sql_pelamar);
              ?>
            <form action="proses_edit_uspas_pelamar.php?id=<?php echo $id;?>" method="post" role="form" class="contactForm">
            <b>Username & Password Lama</b>
            <div class="row">
              <div class="span5 form-group" style="margin-top: 5px;">
                <input type="text" readonly="readonly" required="required" value="<?php echo $data_pelamar['username'];?>"class="form-control"  placeholder="Username Lama"/>
              </div>
              <div class="span5 form-group">
                <input type="password" readonly="readonly" required="required" value="<?php echo $data_pelamar['password'];?>" class="form-control"  placeholder="Password Lama"/>
              </div>
            </div>
             <b>Username & Password Baru</b>
            <div class="row">
              <div class="span5 form-group" style="margin-top: 5px;">
                <input type="text" name="username" required="required" class="form-control"  placeholder="Username"/>
              </div>
              <div class="span5 form-group">
                <input type="password" name="pass1" required="required" class="form-control"  placeholder="Password Baru"/>
              </div>
             
              <div class="span10 form-group">
                <div class="validation"></div>
                <div class="text-left">
                  <button class="btn btn-primary btn-rounded" type="submit" style="margin-top: 8px;"><i class="icon icon-save"></i> Simpan Perubahan</button> 
                  <a href="dashboard_pelamar.php?p=index_pelamar" class="btn btn-danger btn-rounded">Tutup</a>
                </div>
              </div>
            </div>
             
            </div>
          </form>
            </div>
          </article>
        </div>
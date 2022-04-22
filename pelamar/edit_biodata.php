        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Form Edit Biodata Pelamar</a></h3>
              <?php
              include"koneksi.php";
              $id=$_GET['id'];
              $query_pelamar="SELECT * FROm tbl_pelamar WHERE id_pelamar='$id'";
              $sql_pelamar=mysqli_query($connect, $query_pelamar);
              $data_pelamar=mysqli_fetch_array($sql_pelamar);
              ?>
            <form action="proses_edit_biodata.php?id=<?php echo $id;?>" method="post" role="form" class="contactForm">
            <div class="row">
              <div class="span10 form-group">
                <input type="text" required="required" value="<?php echo $data_pelamar['nama_pelamar'];?>" name="nama" class="form-control"  placeholder="Nama Lengkap"/>
              </div>
              <div class="span10 form-group">
                <input type="text" required="required" value="<?php echo $data_pelamar['alamat_pelamar'];?>" name="alamat" class="form-control"  placeholder="Alamat Pelamar"/>
              </div>
              <div class="span10 form-group">
                <input type="text" required="required" value="<?php echo $data_pelamar['telepon_pelamar'];?>" name="telepon" class="form-control"  placeholder="No. HP / Telepon"/>
              </div>
              <div class="span10 form-group">
                <select name="jk" class="form-control" required="required" style="width: 100%; height: 40px;">
                  <option value="" selected="selected">..Pilih Jenis Kelamin..</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="span10 form-group">
                <input type="text" required="required" value="<?php echo $data_pelamar['email_pelamar'];?>" name="email" class="form-control"  placeholder="Nama Lengkap"/>
              </div>
              <div class="span10 form-group">
                 <textarea class="form-control" name="pend" rows="2" required="required" 
                  placeholder="Pendidkan Terakhir"><?php echo $data_pelamar['pendidkan_terakhir_pelamar'];?></textarea>
              </div>
              <div class="span8 form-group">
                <div class="validation"></div>
                <div class="text-left">
                  <button class="btn btn-primary btn-rounded" type="submit" style="margin-top: 8px;"><i class="icon icon-save"></i> Simpan Perubahan</button> 
                  <a href="dashboard_pelamar.php?p=biodata_pelamar" class="btn btn-danger btn-rounded">Tutup</a>
                </div>
              </div>
            </div>
          </form>
            </div>
          </article>
        </div>
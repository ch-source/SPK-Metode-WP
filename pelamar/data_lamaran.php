        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Form Input Lamaran</a></h3>
            </div>
             <?php
              $id=$_GET['id'];
              $query_pelamar="SELECT * FROm tbl_lowongan WHERE id_lowongan='$id'";
              $sql_pelamar=mysqli_query($connect, $query_pelamar);
              $data_pelamar=mysqli_fetch_array($sql_pelamar);
              $query_a="SELECT * FROm tbl_pelamar WHERE id_pelamar='".$data['id_pelamar']."'";
              $sql_a=mysqli_query($connect, $query_a);
              $data_a=mysqli_fetch_array($sql_a);
              ?>
            <form action="proses_kirim_lamaran.php?id=<?php echo $data_a['id_pelamar'];?>" method="post" role="form" enctype="multipart/form-data" class="contactForm">
            <div class="row">
              <div class="span2 form-group">
                <label>ID Lowongan</label>
              </div>
              <div class="span8 form-group">
                <input type="text" value="<?php echo $id?>" name="idlowongan" class="form-control" readonly="readonly"  placeholder="ID Lowongan"/>
              </div>
              <div class="span2 form-group">
                <label style="margin-top: 10px;">Nama</label>
              </div>
              <div class="span8 form-group">
                <input type="text" required="required" value="<?php echo $data_a['nama_pelamar'];?>" name="nama" class="form-control"/>
              </div>
              <div class="span2 form-group">
                <label style="margin-top: 10px;">Alamat</label>
              </div>
              <div class="span8 form-group">
                <input type="text" required="required" value="<?php echo $data_a['alamat_pelamar'];?>" name="alamat" class="form-control"  placeholder="Alamat"/>
              </div>
              <div class="span2 form-group">
                <label style="margin-top: 10px;">No. Hp</label>
              </div>
              <div class="span8 form-group">
                <input type="text" required="required" value="<?php echo $data_a['telepon_pelamar'];?>" name="notelp" class="form-control"  placeholder="Nomor Hanphone/HP"/>
              </div>
              <div class="span2 form-group">
                <label>Surat Lamaran (.pdf)</label>
              </div>

              <div class="span8 form-group">
                <input type="file" required="required" name="nama_file" class="form-control"  />
              </div>
              <div class="span8 form-group">
                <div class="validation"></div>
                <div class="text-left">
                  <button class="btn btn-primary btn-rounded" type="submit" style="margin-top: 8px;"><i class="icon icon-save"></i> Kirim Lamaran</button> 
                  <a href="dashboard_pelamar.php?p=karir" class="btn btn-danger btn-rounded">Tutup</a>
                </div>
              </div>
            </div>
          </form>
          </article>
        </div>
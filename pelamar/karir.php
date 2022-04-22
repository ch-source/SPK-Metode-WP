        <div class="span10">
         <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Lowongan Pekerjaan</a></h3>
            </div>
            <div class="row">
              <?php
              include"koneksi.php";
               $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
                if ($data['level'] == 'Pelamar') {
              $query_x="SELECT * FROm tbl_lowongan ORDER BY tgl_upload DESC";
              $sql_x=mysqli_query($connect, $query_x);
              while ($data_x=mysqli_fetch_array($sql_x)) {
                echo"<div class='span5' style='height:400px;'>
                      <ul class='post-meta'>
                        <li class='first'><i class='icon-calendar'></i><span>".$data_x['tgl_upload']."</span></li>
                        <li class='last'><i class='icon-tags'></i><span><a href=''>Lowongan Kerja Baru</a></span></li>
                      </ul>
               
                      <p><b>".$data_x['judul']."</b></p>
                      <p>Requirement</p>";
                     $no=1;
                       $query_d="SELECT * FROM tbl_syarat_lowongan WHERE id_lowongan='".$data_x['id_lowongan']."'";
                      $sql_d=mysqli_query($connect, $query_d);
                      while ($data_d=mysqli_fetch_array($sql_d)) {
                      echo"<p>".$no.". ".$data_d['syarat']."</p>";
                      $no++;
                      }
                      $cek = mysqli_query($connect, "SELECT * FROM tbl_lamaran WHERE id_pelamar='".$data['id_pelamar']."' AND id_lowongan='".$data_x['id_lowongan']."'");
                      $result = mysqli_num_rows($cek);
                      $data_cek = mysqli_fetch_array($cek);
                      if ($result > 0) {
                        echo"<p style='color:red';>Anda Sudah Melamar Lowongan Pekerjaan Ini</p>
                        </div>";
                      }else if ($result ==0) {
                        echo"<a href='dashboard_pelamar.php?p=data_lamaran&id=".$data_x['id_lowongan']."' class='btn btn-success btn-rounded' style='margin-bottom:3px;''><i class='icon icon-check'></i> Lamar</a>
                        </div>";
                      }
                    }
                  }
                ?>
              
            </div>
          </article>
        </div>
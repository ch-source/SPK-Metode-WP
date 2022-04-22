        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Biodata Pelamar</a></h3>
              <?php
              $query_pelamar="SELECT * FROm tbl_pelamar WHERE id_pelamar='".$data['id_pelamar']."'";
              $sql_pelamar=mysqli_query($connect, $query_pelamar);
              $data_pelamar=mysqli_fetch_array($sql_pelamar);
              ?>
              <?php
              if($data_pelamar['nama_pelamar']==''|| $data_pelamar['alamat_pelamar']=='' || $data_pelamar['telepon_pelamar']==''|| $data_pelamar['jk_pelamar']==''|| $data_pelamar['email_pelamar']==''|| $data_pelamar['pendidkan_terakhir_pelamar']==''){
                echo "<div class='alert alert-danger alert-dismissible'>
                 Data Anda Belum Lengkap!, Silahkan Lengkapi Data Anda Dangen Cara Klik Tomnol <b>'Edit Biodata'</b>
                </div>";
                }else{
                  echo"";
                }
                ?>
              <div class="row">
              	<div class="span2">ID Pelamar</div>
              	<div class="span6">: <?php echo $data_pelamar['nama_pelamar'];?></div>
              </div>
              <div class="row">
              	<div class="span2">Alamat</div>
              	<div class="span6">: <?php echo $data_pelamar['alamat_pelamar'];?></div>
              </div>
              <div class="row">
              	<div class="span2">Nomor Telepon</div>
              	<div class="span6">: <?php echo $data_pelamar['telepon_pelamar'];?></div>
              </div>
              <div class="row">
              	<div class="span2">E-mail</div>
              	<div class="span6">: <?php echo $data_pelamar['email_pelamar'];?></div>
              </div>
              <div class="row">
              	<div class="span2">Pendidikan Terakhir</div>
              	<div class="span6">: <?php echo $data_pelamar['pendidkan_terakhir_pelamar'];?></div>
              </div>
              <div class="row">
              	<div class="span2"><a href="dashboard_pelamar.php?p=edit_biodata&id=<?php echo $data_pelamar['id_pelamar'];?>" class="btn btn-primary btn-rounded"><i class="icon icon-edit"></i> Edit Biodata</a></div>
              	
              </div>
            </div>
          </article>
        </div>
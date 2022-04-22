        <div class="span10">
          <article class="blog-post">
            <div class="post-heading">
             <h3>Soal Test Seleksi</h3>
               <hr>
              <div class="alert alert-success alert-dismissible" style="text-align:justify;">
                <a style="text-decoration:none;" href="" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                  Selamat Datang, anda akan mengikuti test seleksi, dengan ketentuan sebagai berikut:<br>
                    1. Silahkan pilih jawaban yang sesuai.<br>
                    2. Setiap soal mempunyai bobot masing-masing.<br>
                    3. Semua soal wajib dijawab. 
              </div>
            <?php
            include"koneksi.php";
            $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
                if ($data['level'] == 'Pelamar') {}
              $query_pelamar="SELECT * FROM tbl_lamaran WHERE id_pelamar='".$data['id_pelamar']."'";
              $sql_pelamar=mysqli_query($connect, $query_pelamar);
              $data_pelamar=mysqli_fetch_array($sql_pelamar);
              

              $hasil=mysqli_query($connect, "select * from tbl_soal WHERE id_soal='SAL004'");
              $jumlah=mysqli_num_rows($hasil);
              $urut=0;
              while($row =mysqli_fetch_array($hasil))
              {
              $id=$row["id_soal"];
              $nama_kriteria=$row["nama_kriteria"];
              $pilihan_a=$row["a"];
              $pilihan_b=$row["b"];
              $pilihan_c=$row["c"];
              $pilihan_d=$row["d"];
              $pilihan_e=$row["e"];  
              ?>
             
              <form name="form1" method="post" action="proses4.php?idlamaran=<?php echo $data_pelamar['id_lamaran'];?>">
                <input type="hidden" name="id[]" value=<?php echo $id; ?>>
                <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
                <table width="100%" border="0">
                <tr>
                  <h5 width="430"><?php echo "$nama_kriteria"; ?></h5>
                </tr>
                <hr>
                <tr>
                  <td>
                    <input name="pilihan" required="required" type="radio" value="40"> <?php echo "$pilihan_a";?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input name="pilihan" type="radio" required="required" value="50"> 
                    <?php echo "$pilihan_b";?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input name="pilihan" required="required" type="radio" value="60"> <?php echo "$pilihan_c";?> 
                  </td>
                </tr>
                <tr>
                    <td>
                      <input name="pilihan" required="required" type="radio" value="70"> <?php echo "$pilihan_d";?> 
                    </td>
                </tr>
                <tr>
                    <td>
                      <input name="pilihan" required="required" type="radio" value="80"> <?php echo "$pilihan_e";?> 
                    </td>
                </tr>
                <?php
                }
                ?>
                <tr>
                  <td><input type="submit" class="btn btn-primary" name="submit" value="Simpan Jawaban" style="margin-top: 10px;"></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </article>
    </div>
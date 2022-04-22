      <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Hasil Seleksi</h6>
                </div>
          <div class="card-body">
            <a href="javascript:pilihsemua()" class="btn btn-warning btn-xs" style="margin-bottom: 5px;"><i class="fa fa-check-square-o"></i> Check All</a>&nbsp;&nbsp;
            <a href="javascript:bersihkan()"class="btn btn-danger btn-xs" style="margin-bottom: 5px;"><i class="fa  fa-ban"></i> Uncheck All</a>
            <form method="post" action="dashboard_hrd.php?p=hk_proses">
            <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th style="text-align: center;">Pilih</th>
                  <th>No</th>
                  <th>Lowongan</th>
                  <th>ID Pelamar-Nama Pelamar</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  include "koneksi.php";
                  $no=1;
                  $query_user="SELECT * FROM tbl_score_akhir";
                  $sql_user=mysqli_query($connect, $query_user);
                  while ($data_user=mysqli_fetch_array($sql_user)) {
                  ?>
                <tr>
                  <td style="text-align: center;" width="10px;">
                  <label>
                    <input type="checkbox" name="id_pelamar[]" value="<?php echo $data_user['id_pelamar'];?>">
                  </label>
                </td>
                <td><?php echo $no;?></td>
                <?php
                      $query_a="SELECT * FROM tbl_lowongan WHERE id_lowongan='".$data_user['id_lowongan']."'";
                      $sql_a=mysqli_query($connect, $query_a);
                      $data_a=mysqli_fetch_array($sql_a);
                  ?>
                  <td><?php echo $data_user['id_lowongan'];?>-<?php echo $data_a['judul'];?></td>
                  <?php
                      $query_b="SELECT * FROM tbl_pelamar WHERE id_pelamar='".$data_user['id_pelamar']."'";
                      $sql_b=mysqli_query($connect, $query_b);
                      $data_b=mysqli_fetch_array($sql_b);
                  ?>
                  <td><?php echo $data_user['id_pelamar'];?>-<?php echo $data_b['nama_pelamar'];?></td>
                </tr>
                <?php $no++;}?>
              </tbody>
            </table>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                 <div class="form-group">
                  <label>Periode</label>
                   <select name="periode" class="form-control" required="required">
                    <?php
                    $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    for($a=1;$a<=12;$a++){
                     if($a==date("m"))
                     { 
                     $pilih="selected";
                     }
                     else 
                     {
                     $pilih="";
                     }
                    echo("<option value=\"$a\" $pilih>$bulan[$a]</option>"."\n");
                    }
                    ?>
                    </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Tahun</label>
                    
                      <select name="tahun" class="form-control" required="required">
                        <?php
                        $mulai= date('Y') - 50;
                        for($i = $mulai; $i<$mulai + 100;$i++){
                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                        }
                        ?>
                      </select>
                    
                  </div>
              </div>
            </div>
            <a href="dashboard_hrd.php?p=data_seleksi" class="btn btn-danger"><i class="fa fa-close"></i> Tutup</a>
            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Proses Hasil Seleksi</button>
          </form>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </div>
      <script>
        function pilihsemua()
        {
            var daftarku = document.getElementsByName("id_pelamar[]");
            var jml=daftarku.length;
            var b=0;
            for (b=0;b<jml;b++)
            {
                daftarku[b].checked=true;
                
            }
        }
        function bersihkan()
        {
            var daftarku = document.getElementsByName("id_pelamar[]");
            var jml=daftarku.length;
            var b=0;
            for (b=0;b<jml;b++)
            {
                daftarku[b].checked=false;  
            }
        }
      </script>
     
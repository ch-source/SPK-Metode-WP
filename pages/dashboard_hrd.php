<?php
include"koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/lg.png" rel="icon">
  <title>PT. Primafood International</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_hrd.php?p=index_hrd">
        <div class="sidebar-brand-icon">
          <img src="img/lg.png" style="width: 130%; height: 150px" >
        </div>
        <div class="sidebar-brand-text mx-4"> SPKPI</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard_hrd.php?p=index_hrd">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard_hrd.php?p=data_users">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard_hrd.php?p=data_pelamar">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pelamar</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="dashboard_hrd.php?p=data_lowongan">Data Lowongan</a>
            <a class="collapse-item" href="dashboard_hrd.php?p=data_kriteria">Data Kriteria</a>
            <a class="collapse-item" href="dashboard_hrd.php?p=data_soal">Data Soal</a>
          </div>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="dashboard_hrd.php?p=data_lamaran">
          <i class="fas fa-fw fa-book"></i>
          <span>Data Lamaran</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard_hrd.php?p=data_score_akhir">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Score Akhir</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard_hrd.php?p=data_seleksi">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Data Seleksi</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-file"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="dashboard_hrd.php?p=laporan_seleksi">Laporan Hasil Seleksi</a>
            <a class="collapse-item" href="dashboard_hrd.php?p=laporan_pelamar">Laporan Data Pelamar</a>
          </div>
        </div>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <?php
                $order="SELECT * FROM tbl_user WHERE level='Pelamar' AND status_user=''";
                $query_order=mysqli_query($connect, $order);
                $data_order=array();
                while(($row_order=mysqli_fetch_array($query_order)) !=null){
                $data_order[]=$row_order;
                }
                $count=count($data_order);
                ?>
                <span class="badge badge-danger badge-counter"><?php echo $count;?></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Data Registrasi Baru
                </h6>
                <?php include"koneksi.php";
                  $query="SELECT * FROM tbl_user WHERE level='Pelamar' AND status_user=''";
                  $sql=mysqli_query($connect, $query);
                  while ($data_x=mysqli_fetch_array($sql)) {
                  
                ?>
                <a class="dropdown-item d-flex align-items-center" href="dashboard_hrd.php?p=data_pelamar">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-user text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Registrasi Pada: <?php echo $data_x['tgl_registrasi'];?></div>
                    <span class="font-weight-bold"><?php echo $data_x['nama_user'];?></span>
                  </div>
                </a>
              <?php }?>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <?php
                $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
                if ($data['level'] == 'HRD') {}?>
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $data['nama_user'];?> (<?php echo $data['level'];?>)</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="dashboard_hrd.php?p=edit_uspas&id=<?php echo $data['id_user'];?>">
                  <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Username & Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="proses_logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <?php
          $pages_dir='HRD';
          if(!empty($_GET['p'])){
            $pages=scandir($pages_dir,0);
            unset($pages[0],$pages[1]);
            $p=$_GET['p'];
            if(in_array($p.'.php',$pages)){
              include($pages_dir.'/'.$p.'.php');
            }else{
              echo'';
            }
          }else{
            include($pages_dir.'/index_hrd.php');
          }
        ?>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> PT. Primafood International
              |  Design By: <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>
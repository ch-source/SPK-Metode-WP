<?php
include"koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="assets/img/lg.png" rel="icon">
  <title>PT. Primafood International</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">


  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <!-- =======================================================
    Theme Name: Serenity
    Theme URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- logo -->
          <a class="brand logo" href="index.php"><img src="assets/img/lg.png" style="height: 80px;" alt="" /> PT. PRIMAFOOD INTERNATIONAL</a>
          <!-- end logo -->
          <!-- top menu -->
          <div class="navigation">
            <nav>
              <ul class="nav topnav">
                <li class="dropdown">
                  <a href="dashboard_pelamar.php?p=index_pelamar">Beranda</a>
                </li>
                <li>
                  <a href="dashboard_pelamar.php?p=tentang">Tentang</a>
                </li>
                <li>
                  <a href="dashboard_pelamar.php?p=karir">Karir</a>
                </li>
                <li>
                  <a href="dashboard_pelamar.php?p=kontak">Kontak</a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- end menu -->
        </div>
      </div>
    </div>
  </header>
  <!-- Subhead
================================================== -->
  
  <section id="breadcrumb" style="margin-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="span12">
          <ul class="breadcrumb notop">
            <li><b><a href="#">Dashboard Pelamar</a><span class="divider"></span></b></li>
            
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span2">
          <aside>
            <div class="widget">
              <ul class="cat">
                <li><a href="dashboard_pelamar.php?p=biodata_pelamar">Biodata Pelamar</a></li>
                <li style="text-decoration: none;"><a href="dashboard_pelamar.php?p=lamaran">Data Lamaran</a></li>
                <li><a href="dashboard_pelamar.php?p=data_soal">Data Soal</a></li>
              </ul>
            </div>
            <div class="widget" style="text-align: center;">
              <h4 style="text-align: center;">Profile Anda</h4>
              <ul class="recent-posts">
                <?php
                $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_user  WHERE username='$_SESSION[masuk]'")); 
                if ($data['level'] == 'Pelamar') {
                  $konten = ' <i class="icon-circled icon-64 icon-user"></i>
                  <li style="text-align:center">
                              <a href="#">'.$data['nama_user'].'</a>
                              <a href="#"> ('.$data['level'].')</a>
                              <div class="clear">
                            </div>
                            </li>';
                          }
                          $logout='
                          <a href="dashboard_pelamar.php?p=edit_uspas&id='.$data['id_user'].'" class="btn btn-warning btn-rounded" style="margin-bottom:3px;"><i class="icon icon-edit"></i> Edit Username & Password</a>

                          <a href="./?keluar=1" class="btn btn-danger btn-rounded"><i class="icin icon-signout"></i> Sign Out</a>';
                if (isset($_GET['keluar'])) {
                  unset($_SESSION['masuk']);
                  header("location:./");
                }
                echo $konten.'<br>'.$logout;
                ?>
                <?php
                ?>
                
              </ul>
            </div>
          </aside>
        </div>
         <?php
          $pages_dir='pelamar';
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
            include($pages_dir.'/index_pelamar.php');
          }
          ?>
      </div>
    </div>
  </section>
  <!-- Footer
 ================================================== -->
  <footer class="footer">
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>
              &copy; PT. Primafood International
            </p>
          </div>
          <div class="span6">
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Serenity
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- JavaScript Library Files -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/sequence/sequence.jquery-min.js"></script>
  <script src="assets/js/sequence/setting.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/application.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/hover/setting.js"></script>
  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>

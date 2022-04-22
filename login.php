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
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/sequence.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">

  <!-- fav and touch icons -->
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

<body>
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
                <li class="dropdown active">
                  <a href="index.php">Beranda</a>
                </li>
                 <li class="dropdown">
                  <a href="tentang.php">Tentang</a>
                </li>
                <li class="dropdown">
                  <a href="karir.php">Karir</a>
                </li>
                <li class="dropdown">
                  <a href="kontak.php">Kontak</a>
                </li>
                <li class="dropdown">
                  <a href="login.php">Login</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="maincontent" style="margin-top: 140px;">
    <div class="container">
      <div class="row">
        <div class="span4">
        </div>
        <div class="span4">
          <a class="brand logo" href="index.php"><img src="assets/img/lg.png" style="height: 130px; width: 130px; margin-left: 120px;"></a>
          <h3 style="text-align: center;">PT. PRIMAFOOD INTERNATIONAL</h3>
          <br>
          
             <form action="proses_login.php" method="post" role="form" class="contactForm">
            <?php
            if(isset($_GET['notif'])){
              if($_GET['notif']=="belum-valid"){
                echo "<div class='alert alert-danger alert-dismissible'>
                <a style='text-decoration:none;' href='login.php' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a><i class='icon icon-danger'></i> Proses Login Gagal, Data Anda Belum Divalidasi Oleh Admin. Silahkan hubungi Admin melalui Telepon: <b>(0361) 4481380  & email: mitra_sakanabali@gmail.com</b>, untuk mempercepat proses validasi.</b>
                </div>";
                }
              }
              ?>
                  
                    <div class="form-group" >
                      <input type="text" name="Username" class="form-control" placeholder="Email / Username"/>
                    </div>
                    <div class="form-group">
                      <input type="password" name="Password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                      <div class="text-left">
                        <button class="btn btn-color btn-rounded" name="masuk" type="submit"><i class="icon icon-signin"></i> Login</button>
                      </div>
                    </div>
                
                </form>
           
        </div>
        <div class="span4">
        </div>
    </div>
  </section>
  <!-- Footer
 ================================================== -->
  <footer class="footer" style="margin-top: 100px;">
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

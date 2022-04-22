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
  <!-- Subhead
================================================== -->
  <section id="breadcrumb" style="margin-top: 90px;">
    <div class="container">
      <div class="row">
        <div class="span12">
          <ul class="breadcrumb notop">
            <li><a href="#">Karir</a><span class="divider">/</span></li>
            <li class="active">Registrasi</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span4">
          <aside>
            <div class="widget">
              <ul class="cat">
                <li><a href="karir.php">Info Lowongan</a></li>
                <li><a href="cara_melamar.php">Cara Melamar Kerja</a></li>
                <li><a href="registrasi.php">Registrasi</a></li>
              </ul>
            </div>
          </aside>
        </div>
        <div class="span8">
          <!-- start article 1 -->
          <article class="blog-post">
            <div class="post-heading">
              <h3><a href="#">Registrasi</a></h3>
            </div>
            <hr>
            <div class="row">
              <div class="span8">
            <?php
            if(isset($_GET['notif'])){
              if($_GET['notif']=="-regis-berhasil"){
                echo "<div class='alert alert-success alert-dismissible'>
                <a style='text-decoration:none;' href='registrasi.php' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a><i class='icon icon-check'></i> Proses Registrasi Berhasil, Silahkan Tunggu Beberapa Saat, Sampai Data Anda Divalidasi Oleh Admin. Atau silahkan hubungi Admin melalui Telepon: <b>(0361) 4481380  & email: mitra_sakanabali@gmail.com</b>, untuk mempercepat proses validasi.</b>
                </div>";
                }
              }
              ?>
                <form action="proses_registrasi.php" method="post" role="form" class="contactForm">
                  <div class="row">
                    <div class="span8 form-group">
                      <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Lengkap"/>
                    </div>
                    <div class="span8 form-group">
                      <input type="text" name="notelp" class="form-control" id="name" placeholder="Nomor Telepon/HP"/>
                    </div>
                    <div class="span8 form-group">
                      <input type="text" name="email" class="form-control" id="name" placeholder="Email"/>
                    </div>
                    <div class="span8 form-group">
                      <input type="password" name="password" class="form-control" id="name" placeholder="Password"/>
                    </div>
                    
                    <div class="span8 form-group">
                      <div class="text-left">
                        <button class="btn btn-color btn-rounded" type="submit">Daftar</button>
                      </div>
                    </div>
                  </div>
                </form>
              
              </div>
            </div>
          </article>
        </div>
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

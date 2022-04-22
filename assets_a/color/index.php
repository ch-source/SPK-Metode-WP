<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PT. Mitra Sakana Bali</title>
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
         <a class="brand logo" href="index.php"><img src="assets/img/logo.png" alt="" /></a>
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
          <!-- end menu -->
        </div>
      </div>
    </div>
  </header>

  <section id="maincontent" style="margin-top: 80px;">
    <div class="container">
      <div class="row">
        <div class="span12">
          <?php
            $tahun=getdate();
            $thn=$tahun['year'];
            ?>
          <h4>Grafik Penerimaan Karyawan Baru PT. Mitra Sakana Bali Tahun <?php echo $thn;?></h4>
          <table>
            <tr>
              <td style="width: 100px; height: 20px; background-color: rgba(21,186,103,0.4)"></td>
              <td>Karyawan Diterima</td>
            </tr>
             <tr>
              <td style="width: 100px; height: 20px; background-color: rgba(21,113,186,0.5);"></td>
              <td>Karyawan Tidak Diterima</td>
            </tr>
          </table>
          <div id="canvas-holder1">
            <?php
            $tahun=getdate();
            $thn=$tahun['year'];
            $bln=$tahun['month'];
            $tgl = date("d");
            include"koneksi.php";
            $bulan= mysqli_query($connect, "SELECT periode FROM tbl_grafik WHERE tahun='$thn' order by id_grafik asc");
            $penghasilan = mysqli_query($connect, "SELECT lulus FROM tbl_grafik WHERE tahun='$thn' order by id_grafik asc");
            $penghasilan2 = mysqli_query($connect, "SELECT tidak_lulus FROM tbl_grafik WHERE tahun='$thn' order by id_grafik asc");
            ?>
            <canvas class="bar-chart"></canvas>
        </div>
      </div>
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
              &copy; PT. Mitra Sakana Bali
            </p>
          </div>
          <div class="span6">
            <div class="credits">
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
  <script src="asset_chart/js/plugins/chart.min.js"></script>
 <script type="text/javascript">
      (function(jQuery){

        // start: Chart =============

        Chart.defaults.global.pointHitDetectionRadius = 1;
        Chart.defaults.global.customTooltips = function(tooltip) {

            var tooltipEl = $('#chartjs-tooltip');

            if (!tooltip) {
                tooltipEl.css({
                    opacity: 0
                });
                return;
            }

            tooltipEl.removeClass('above below');
            tooltipEl.addClass(tooltip.yAlign);

            var innerHtml = '';
            if (undefined !== tooltip.labels && tooltip.labels.length) {
                for (var i = tooltip.labels.length - 1; i >= 0; i--) {
                    innerHtml += [
                        '<div class="chartjs-tooltip-section">',
                        '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
                        '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
                        '</div>'
                    ].join('');
                }
                tooltipEl.html(innerHtml);
            }

            tooltipEl.css({
                opacity: 1,
                left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
                top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
                fontFamily: tooltip.fontFamily,
                fontSize: tooltip.fontSize,
                fontStyle: tooltip.fontStyle
            });
        };
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var barChartData = {
                labels: [<?php while ($b = mysqli_fetch_array($bulan)) 
                  {
                    if ($b['periode']=='01') {
                      $x='January';
                    }elseif ($b['periode']=='02') {
                        $x='February';
                    }elseif ($b['periode']=='03') {
                        $x='Maret';
                    }elseif ($b['periode']=='04') {
                        $x='April';
                    }elseif ($b['periode']=='05') {
                        $x='Mei';
                    }elseif ($b['periode']=='06') {
                        $x='Juny';
                    }elseif ($b['periode']=='07') {
                        $x='Jully';
                    }elseif ($b['periode']=='08') {
                        $x='Agustus';
                    }elseif ($b['periode']=='09') {
                        $x='September';
                    }elseif ($b['periode']=='10') {
                        $x='Oktober';
                    }elseif ($b['periode']=='11') {
                        $x='November';
                    }elseif ($b['periode']=='12') {
                        $x='Desember';
                    }

                    echo '"' .$x. '",';}?>],
                datasets: [
                    {
                        label: "Karyawan Diterima",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(21,186,103,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['lulus'] . '",';}?>]
                    },
                    {
                        label: "Karyawan Tidak Diterima",
                        fillColor: "rgba(21,113,186,0.5)",
                        strokeColor: "rgba(151,187,205,0.8)",
                        highlightFill: "rgba(21,113,186,0.2)",
                        highlightStroke: "rgba(21,113,186,0.2)",
                        data: [<?php while ($p = mysqli_fetch_array($penghasilan2)) { echo '"' . $p['tidak_lulus'] . '",';}?>]
                    }
                ]
            };

         window.onload = function(){
                var ctx3 = $(".bar-chart")[0].getContext("2d");
                window.myLine = new Chart(ctx3).Bar(barChartData, {
                     responsive: true,
                        showTooltips: true
                });
            };

      })(jQuery);
     </script>
</body>
</html>

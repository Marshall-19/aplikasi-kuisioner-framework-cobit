<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Gap.php";
$gap = new Gap();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Laporan GAP</title>
  <?php includeTemplate("head.php"); ?>
  <style>
    .container {
      padding-right: 0;
      padding-left: 0;
    }
  </style>
</head>

<body>
    
    <?php includeTemplate("header.php"); ?>
    <?php includeTemplate("menu.php"); ?>
    
    <!-- KONTEN AREA-->
    <div class="container">
        <div class="row">
           <?php includeTemplate("sidebar.php"); ?>
            <div class="col-sm-9 col-xs-12">
              <div class="sale-statistic-inner">
                <div class="curved-inner-pro">
                  <div class="curved-ctn">
                    <!-- BAGIAN ISI KONTEN -->
                    <div class="normal-table-list">
                      <h2>Laporan Perhitungan GAP</h2>
                      <a href="cetak_laporan_gap.php" class="btn btn-primary btn-sm">Cetak</a>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Domain Id</th>
                              <th>Indeks Maturity</th>
                              <th>Harapan</th>
                              <th>Gap</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // ambil data pernyataan
                            $data_gap = $gap->ambilData();
                            // menampilkan data
                            foreach($data_gap as $no => $im)
                            {
                          ?>
                            <tr>
                              <td><?=$no+1?></td>
                              <td><?=$im['domain_nama']?></td>
                              <td><?=$im['indeks_maturity']?></td>
                              <td><?=$im['harapan']?></td>
                              <td><?=$im['gap']?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                      </table>
                      <br>
                      <br>
                      <br>
                      <h2>Laporan Grafik GAP</h2>
                      <canvas id="radar-chart" width="800" height="450"></canvas>
                    </div>
                  </div>
                  <!-- EOF BAGIAN ISI KONTEN -->
                  </div>
                </div>
              </div>
            </div>
            
        </div>
    </div>
    <!-- END KONTEN AREA-->
    
    <?php includeTemplate("footer.php"); ?>
    <?php includeTemplate("script.php"); ?>
    <script>
      var data_gap = <?=json_encode($gap->ambilData());?>;
      var labels = [];
      var indeks_maturity = [];
      var gap = [];
      var harapan = [];
      for(var x = 0; x < data_gap.length; x++)
      {
        labels[x] = data_gap[x].domain_nama;
        indeks_maturity[x] = data_gap[x].indeks_maturity;
        gap[x] = data_gap[x].gap;
        harapan[x] = data_gap[x].harapan;
      }
    	new Chart(document.getElementById("radar-chart"), {
          responsive: true,        
          type: 'bar',
          data: {
            labels: labels,
            datasets: [
              {
                label: "Indeks Maturity",
                backgroundColor: "#3e95cd",
                data: indeks_maturity
              },
              {
                label: "Harapan",
                backgroundColor: "#8e5ea2",
                data: harapan
              },
              {
                label: "GAP",
                backgroundColor: "#6a0d0d",
                data: gap
              }
            ]
          },
          options: {
            title: {
              display: true,
              text: 'Grafik Laporan GAP'
            },
            scales: {
               yAxes: [{
                  ticks: {
                     min: Math.min.apply(this, indeks_maturity) * 0,
                     max: Math.max.apply(this, harapan) + 5,
                     stepSize: 1
                  }
               }]
            }
          }
      });
    </script>
    
</body>

</html>


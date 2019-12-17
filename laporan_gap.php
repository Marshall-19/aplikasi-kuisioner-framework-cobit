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
                      <h2>Laporan GAP</h2>
                      <a href="cetak_laporan_gap.php" class="btn btn-primary btn-sm">Cetak</a>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Domain Id</th>
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
                              <td><?=$im['harapan']?></td>
                              <td><?=$im['gap']?></td>
                              
                            </tr>
                          
                        <?php
                            }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                  <div>
                  	<div id="grafik-gap" class="flot-chart flot-chr-pro"></div>
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
    	var data1 = [
            [1, 60],
            [2, 30],
            [3, 50],
            [4, 100],
            [5, 10],
            [6, 90],
            [7, 85]
        ],
        data2 = [
            [1, 20],
            [2, 90],
            [3, 60],
            [4, 40],
            [5, 100],
            [6, 25],
            [7, 65]
        ],
        data3 = [
            [1, 100],
            [2, 20],
            [3, 60],
            [4, 90],
            [5, 80],
            [6, 10],
            [7, 5]
        ],
        barData = [{
            label: "Product",
            data: data1,
            color: "#00c292"
        }, {
            label: "Product",
            data: data2,
            color: "#fb9678"
        }, {
            label: "Product",
            data: data3,
            color: "#01c0c8"
        }];
    $("#grafik-gap")[0] && $.plot($("#grafik-gap"), barData, {
        series: {
            bars: {
                show: !0,
                barWidth: .05,
                order: 1,
                fill: 1
            }
        },
        grid: {
            borderWidth: 1,
            borderColor: "#eee",
            show: !0,
            hoverable: !0,
            clickable: !0
        },
        yaxis: {
            tickColor: "#eee",
            tickDecimals: 0,
            font: {
                lineHeight: 14,
                style: "normal",
                color: "#00c292"
            },
            shadowSize: 0
        },
        xaxis: {
            tickColor: "#fff",
            tickDecimals: 0,
            font: {
                lineHeight: 14,
                style: "normal",
                color: "#00c292"
            },
            shadowSize: 0
        },
        legend: {
            container: ".flc-bar",
            backgroundOpacity: .5,
            noColumns: 0,
            backgroundColor: "white",
            lineWidth: 0
        }
    })
    </script>
    
</body>

</html>


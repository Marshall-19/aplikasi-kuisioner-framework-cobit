<?php
require_once "lib/helper.php";
require_once "models/IndeksMaturity.php";
$indeks_maturity = new IndeksMaturity();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Data Indeks Maturity</title>
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
                      <h2>Data Indeks Maturity</h2>
                      <a href="tambah_indeks_maturity.php" class="btn btn-primary btn-sm">Tambah Indeks Maturity Baru</a>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Domain Id</th>
                              <th>Total Pernyataan</th>
                              <th>Total Responden</th>
                              <th>Total Nilai</th>
                              <th>Indeks Maturity</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // ambil data pernyataan
                            $data_indeks_maturity = $indeks_maturity->ambilData();
                            // menampilkan data
                            foreach($data_indeks_maturity as $no => $im)
                            {
                          ?>
                          
                            <tr>
                              <td><?=$no+1?></td>
                              <td><?=$im['domain_nama']?></td>
                              <td><?=$im['pernyataan_total']?></td>
                              <td><?=$im['responden_total']?></td>
                              <td><?=$im['nilai_total']?></td>
                              <td><?=$im['indeks_maturity']?></td>
                              <td><?=$im['keterangan']?></td>
                              <td>
                                <a href="proses_hapus_indeks_maturity.php?indeks_id=<?=$im['indeks_id']?>" class="btn btn-danger btn-sm">Hapus</a>
                              </td>
                            </tr>
                          
                        <?php
                            }
                        ?>
                        </tbody>
                        </table>
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
    
</body>

</html>


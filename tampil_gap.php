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
  <title>Data GAP</title>
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
                      <h2>Data GAP</h2>
                      <a href="tambah_gap.php" class="btn btn-primary btn-sm">Tambah Gap Baru</a>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Domain Id</th>
                              <th>Gap</th>
                              <th>Harapan</th>
                              <th>Aksi</th>
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
                              <td><?=$im['gap']?></td>
                              <td><?=$im['harapan']?></td>
                              <td>
                                <a href="proses_hapus_gap.php?gap_id=<?=$im['gap_id']?>" class="btn btn-danger btn-sm">Hapus</a>
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


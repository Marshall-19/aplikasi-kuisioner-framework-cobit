<?php
require_once "lib/helper.php";
require_once "models/Pernyataan.php";
$pernyataan = new Pernyataan();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Data Pernyataan</title>
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
                      <h2>Data Pernyataan</h2>
                      <a href="tambah_pernyataan.php" class="btn btn-primary btn-sm">Tambah Pernyataan Baru</a>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Isi Pernyataan</th>
                              <th>Domain</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // ambil data pernyataan
                            $data_pernyataan = $pernyataan->ambilData();
                            // menampilkan data
                            foreach($data_pernyataan as $no => $pet)
                            {
                          ?>
                          
                            <tr>
                              <td><?=$no+1?></td>
                              <td><?=$pet['pernyataan']?></td>
                              <td><?=$pet['domain_nama']?></td>
                              <td>
                                <a href="edit_pernyataan.php?pernyataan_id=<?=$pet['pernyataan_id']?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="proses_hapus_pernyataan.php?pernyataan_id=<?=$pet['pernyataan_id']?>" class="btn btn-danger btn-sm">Hapus</a>
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


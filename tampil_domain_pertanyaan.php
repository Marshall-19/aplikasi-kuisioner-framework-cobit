<?php
require_once "lib/helper.php";
require_once "models/DomainPernyataan.php";
$domain = new DomainPernyataan();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Data Domain</title>
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
                      <h2>Data Domain</h2>
                      <a href="tambah_domain_pernyataan.php" class="btn btn-primary btn-sm">Tambah Domain Baru</a>
                      <div class="bsc-tbl-st">
                      <table style="width: 100%;"  class="table table-bordered table-stripped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Domain</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          // ambil data domain
                          $data_domain = $domain->ambilData();
                          // menampilkan data
                          foreach($data_domain as $no => $kat)
                          {
                        ?>
                        
                          <tr>
                            <td><?=$no+1?></td>
                            <td><?=$kat['domain_nama']?></td>
                            <td><?=$kat['domain_keterangan']?></td>
                            <td>
                              <a href="edit_domain_pernyataan.php?domain_id=<?=$kat['domain_id']?>" class="btn btn-info btn-sm">Edit</a>
                              <a href="proses_hapus_domain_pernyataan.php?domain_id=<?=$kat['domain_id']?>" class="btn btn-danger btn-sm">Hapus</a>
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


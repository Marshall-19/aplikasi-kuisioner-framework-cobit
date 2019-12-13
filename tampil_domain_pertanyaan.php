<?php
require_once "lib/helper.php";
require_once "models/DomainPertanyaan.php";
$domain = new DomainPertanyaan();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
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
            <div class="col-xs-12">
              <div class="sale-statistic-inner notika-shadow mg-tb-30">
                <div class="curved-inner-pro">
                  <div class="curved-ctn">
                    <div class="bsc-tbl-st">
                    <!-- BAGIAN ISI KONTEN -->
                  <a href="tambah_domain_pertanyaan.php" class="btn btn-primary btn-sm">Tambah Domain Baru</a>
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
                          <a href="edit_domain_pertanyaan.php?domain_id=<?=$kat['domain_id']?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="proses_hapus_domain_pertanyaan.php?domain_id=<?=$kat['domain_id']?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                      </tr>
                    
                  <?php
                      }
                  ?>
                  </tbody>
                  </table>
                  <!-- EOF BAGIAN ISI KONTEN -->
                  </div>
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


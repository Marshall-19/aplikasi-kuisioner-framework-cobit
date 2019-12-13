<?php
require_once "lib/helper.php";
require_once "models/Pertanyaan.php";
$pertanyaan = new Pertanyaan();
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
                  <a href="tambah_pertanyaan.php" class="btn btn-primary btn-sm">Tambah Pertanyaan Baru</a>
                  <table style="width: 100%;"  class="table table-bordered table-stripped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Isi Pertanyaan</th>
                        <th>Domain</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // ambil data pertanyaan
                      $data_pertanyaan = $pertanyaan->ambilData();
                      // menampilkan data
                      foreach($data_pertanyaan as $no => $pet)
                      {
                    ?>
                    
                      <tr>
                        <td><?=$no+1?></td>
                        <td><?=$pet['pertanyaan']?></td>
                        <td><?=$pet['domain_nama']?></td>
                        <td>
                          <a href="edit_pertanyaan.php?pertanyaan_id=<?=$pet['pertanyaan_id']?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="proses_hapus_pertanyaan.php?pertanyaan_id=<?=$pet['pertanyaan_id']?>" class="btn btn-danger btn-sm">Hapus</a>
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


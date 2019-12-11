<?php
require_once "lib/helper.php";
require_once "models/Responden.php";
$responden = new Responden();
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
                  <a href="tambah_responden.php" class="btn btn-primary btn-sm">Tambah Responden Baru</a>
                  <table style="width: 100%;" class="table table-bordered table-stripped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Pendidikan</th>
                        <th>Masa Kerja</th>
                        <th>Status Sosial</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // ambil data responden
                      $data_responden = $responden->ambilData();
                      // menampilkan data
                      foreach($data_responden as $no => $pet)
                      {
                    ?>
                    
                      <tr>
                        <td><?=$no+1?></td>
                        <td><?=$pet['responden_nama']?></td>
                        <td><?=$pet['responden_jk']?></td>
                        <td><?=$pet['responden_usia']?></td>
                        <td><?=$pet['responden_pendidikan']?></td>
                        <td><?=$pet['responden_masa_kerja']?></td>
                        <td><?=$pet['responden_status_sosial']?></td>
                        <td>
                          <a href="proses_hapus_responden.php?responden_id=<?=$pet['responden_id']?>" class="btn btn-danger btn-sm">Hapus</a>
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



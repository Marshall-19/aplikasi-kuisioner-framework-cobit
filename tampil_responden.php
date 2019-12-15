<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Responden.php";
$responden = new Responden();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Data Responden</title>
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
                      <h2>Data Responden</h2>
                      <a href="tambah_responden.php" class="btn btn-primary btn-sm">Tambah Responden Baru</a>
                      <div class="bsc-tbl-st">
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
                              <td><?=$pet['responden_no']?></td>
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



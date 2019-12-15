<?php
require_once "lib/helper.php";
require_once "models/Kuisioner.php";
$kuisioner = new Kuisioner();

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Data Kuisioner</title>
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
                      <h2>Data Kuisioner</h2>
                      <a href="tambah_kuisioner.php" class="btn btn-primary btn-sm">Tambah Kuisioner Baru</a>
                      <div class="bsc-tbl-st">
                        <table class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>No Responden</th>
                              <th>Total Nilai</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // ambil data kuisioner
                            $data_kuisioner = $kuisioner->ambilData();
                            // menampilkan data
                            foreach($data_kuisioner as $no => $pet)
                            {
                              $harapan = 5;
                              $gap = 0;
                              $im = $pet['kuisioner_skor'] / ($pet['kuisioner_total_pernyataan']*$pet['kuisioner_total_responden']);
                              $keterangan_im = "";
                              if($im >= 0 && $im <= 0.49)
                              {
                                $keterangan_im = "Tidak Ada";
                              }
                              elseif($im >= 0.50 && $im <= 1.49)
                              {
                                $keterangan_im = "Inisialisasi";
                              }
                              elseif($im >= 1.50 && $im <= 2.49)
                              {
                                $keterangan_im = "Dapat Diulang";
                              }
                              elseif($im >= 2.50 && $im <= 3.49)
                              {
                                $keterangan_im = "Ditetapkan";
                              }
                              elseif($im >= 3.50 && $im <= 4.49)
                              {
                                $keterangan_im = "Terkelola";
                              }
                              elseif($im >= 4.50 && $im <= 5)
                              {
                                $keterangan_im = "Optimal";
                              }
                              $gap = $harapan - $im;
                          ?>
                          
                            <tr>
                              <td><?=$no+1?></td>
                              <td><?=TanggalIndo($pet['kuisioner_tgl'])?></td>
                              <td><?=$pet['responden_no']?></td>
                              <td><?=$pet['kuisioner_skor']?></td>
                              <td>
                                <a href="proses_hapus_kuisioner.php?kuisioner_id=<?=$pet['kuisioner_id']?>" class="btn btn-danger btn-sm">Hapus</a>
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


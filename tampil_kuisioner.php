<?php
require_once "lib/helper.php";
require_once "models/Kuisioner.php";
$kuisioner = new Kuisioner();

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
                    <a href="tambah_kuisioner.php" class="btn btn-primary btn-sm">Tambah Kuisioner Baru</a>
                    <table style="width: 100%;"  class="table table-bordered table-stripped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Kuisioner</th>
                          <th>Tanggal</th>
                          <th>Data Responden</th>
                          <th>Hasil Kuisioner</th>
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
                          $im = $pet['kuisioner_skor'] / ($pet['kuisioner_total_pertanyaan']*$pet['kuisioner_total_responden']);
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
                          <td><?=$pet['kuisioner_kode']?></td>
                          <td><?=TanggalIndo($pet['kuisioner_tgl'])?></td>
                          <td>
                            <table style="width: 100%;"  class="table table-bordered">
                              <tr>
                                <td>Nama</td>
                                <td><?=$pet['responden_nama']?></td>
                              </tr>
                              <tr>
                                <td>Jenis Kelamin</td>
                                <td><?=$pet['responden_jk']?></td>
                              </tr>
                              <tr>
                                <td>Usia</td>
                                <td><?=$pet['responden_usia']?></td>
                              </tr>
                              <tr>
                                <td>Pendidikan</td>
                                <td><?=$pet['responden_pendidikan']?></td>
                              </tr>
                              <tr>
                                <td>Masa Kerja</td>
                                <td><?=$pet['responden_masa_kerja']?></td>
                              </tr>
                              <tr>
                                <td>Status Sosial</td>
                                <td><?=$pet['responden_status_sosial']?></td>
                              </tr>
                            </table>
                          </td>
                          <td>
                            <table style="width: 100%;"  class="table table-bordered">
                              <tr>
                                <td>Skor</td>
                                <td><?=$pet['kuisioner_skor']?></td>
                              </tr>
                              <tr>
                                <td>Jumlah Pertanyaan</td>
                                <td><?=$pet['kuisioner_total_pertanyaan']?></td>
                              </tr>
                              <tr>
                                <td>Jumlah Responden</td>
                                <td><?=$pet['kuisioner_total_responden']?></td>
                              </tr>
                              <tr>
                                <td>Indeks Maturity / Keterangan</td>
                                <td><?=$im." / ".$keterangan_im?></td>
                              </tr>
                              <tr>
                                <td>Harapan</td>
                                <td><?=$harapan?></td>
                              </tr>
                              <tr>
                                <td>GAP</td>
                                <td><?=$gap?></td>
                              </tr>
                            </table>
                          </td>
                          <td>
                            <a href="proses_hapus_kuisioner.php?kuisioner_id=<?=$pet['kuisioner_id']?>" class="btn btn-danger btn-sm">Hapus</a>
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


<?php
  require_once "lib/helper.php";
  require_once "models/DomainPertanyaan.php";
  require_once "models/Pertanyaan.php";
  $domain = new DomainPertanyaan();
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
                    <!-- BAGIAN ISI KONTEN -->

                    <form action="proses_tambah_kuisioner.php" method="POST">
                    <div class="form-group">
                      <label>Kode Kuisioner</label>
                      <input type="text" name="kuisioner_kode" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <label>Nama Responden</label>
                      <input type="text" name="responden_nama" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <label>Usia</label>
                      <input type="radio" name="responden_usia" value="17 - 25 Tahun" /> 17 - 25 Tahun
                      <input type="radio" name="responden_usia" value="26 - 45 Tahun" /> 26 - 45 Tahun
                      <input type="radio" name="responden_usia" value="> 46 Tahun" /> > 46 Tahun
                    </div>
                    
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="radio" name="responden_jk" value="Pria" /> Pria
                      <input type="radio" name="responden_jk" value="Wanita" /> Wanita
                    </div>
                    
                    <div class="form-group">
                      <label>Pendidikan Terakhir</label>
                      <input type="radio" name="responden_pendidikan" value="SMA" /> SMA
                      <input type="radio" name="responden_pendidikan" value="D3" /> D3
                      <input type="radio" name="responden_pendidikan" value="S1" /> S1
                      <input type="radio" name="responden_pendidikan" value="S2" /> S2
                    </div>
                    
                    <div class="form-group">
                      <label>Masa Kerja</label>
                      <input type="radio" name="responden_masa_kerja" value="0 - 5 Tahun" /> 0 - 5 Tahun
                      <input type="radio" name="responden_masa_kerja" value="6 - 10 Tahun" /> 6 - 10 Tahun
                      <input type="radio" name="responden_masa_kerja" value="> 10 Tahun" /> > 10 Tahun
                    </div>
                    
                    <div class="form-group">
                      <label>Status Sosial</label>
                      <input type="radio" name="responden_status_sosial" value="Menikah" /> Menikah
                      <input type="radio" name="responden_status_sosial" value="Belum Menikah" /> Belum Menikah
                    </div>
                    
                    <hr>
                    
                    <?php
                      $data_domain = $domain->ambilData();
                      foreach($data_domain as $kat)
                      {
                    ?>
                        <h3><?=$kat['domain_nama']." ".$kat['domain_keterangan']?></h3>
                        <table class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>PERNYATAAN</th>
                              <th>SS</th>
                              <th>S</th>
                              <th>KS</th>
                              <th>TS</th>
                              <th>STS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $data_pertanyaan = $pertanyaan->ambilDataDenganKondisi(["domain_id" => $kat['domain_id']]);
                              foreach($data_pertanyaan as $no => $pet)
                              {
                            ?>
                              <tr>
                                <td><?=$no+1?></td>
                                <td>
                                  <input type="hidden" name="pertanyaan_id[]" value="<?=$pet['pertanyaan_id']?>" />
                                  <?=$pet['pertanyaan']?>
                                </td>
                                <td>
                                  <input type="radio" name="skor<?=$pet['pertanyaan_id']?>" value="5" />
                                </td>
                                <td>
                                  <input type="radio" name="skor<?=$pet['pertanyaan_id']?>" value="4" />
                                </td>
                                <td>
                                  <input type="radio" name="skor<?=$pet['pertanyaan_id']?>" value="3" />
                                </td>
                                <td>
                                  <input type="radio" name="skor<?=$pet['pertanyaan_id']?>" value="2" />
                                </td>
                                <td>
                                  <input type="radio" name="skor<?=$pet['pertanyaan_id']?>" value="1" />  
                                </td>
                              </tr>
                            <?php
                              }
                            ?>
                          </tbody>
                        </table>
                    <?php
                      }
                    ?>
                    
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                    </form>
                    
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


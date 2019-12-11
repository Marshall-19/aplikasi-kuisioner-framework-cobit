<?php
  require_once "lib/helper.php";
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
                  <button class="btn btn-success btn-sm" onclick="window.history.back();">Kembali</button>
                  <form action="proses_tambah_responden.php" method="POST">
                    <div class="form-group">
                      <label>Nama Responden</label>
                      <input type="text" name="responden_nama" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <label>Usia</label>
                      <input type="radio" name="responden_usia" class="form-control" value="17 - 25 Tahun" /> 17 - 25 Tahun
                      <input type="radio" name="responden_usia" class="form-control" value="26 - 45 Tahun" /> 26 - 45 Tahun
                      <input type="radio" name="responden_usia" class="form-control" value="> 46 Tahun" /> > 46 Tahun
                    </div>
                    
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="radio" name="responden_jk" class="form-control" value="Pria" /> Pria
                      <input type="radio" name="responden_jk" class="form-control" value="Wanita" /> Wanita
                    </div>
                    
                    <div class="form-group">
                      <label>Pendidikan Terakhir</label>
                      <input type="radio" name="responden_pendidikan" class="form-control" value="SMA" /> SMA
                      <input type="radio" name="responden_pendidikan" class="form-control" value="D3" /> D3
                      <input type="radio" name="responden_pendidikan" class="form-control" value="S1" /> S1
                      <input type="radio" name="responden_pendidikan" class="form-control" value="S2" /> S2
                    </div>
                    
                    <div class="form-group">
                      <label>Masa Kerja</label>
                      <input type="radio" name="responden_masa_kerja" class="form-control" value="0 - 5 Tahun" /> 0 - 5 Tahun
                      <input type="radio" name="responden_masa_kerja" class="form-control" value="6 - 10 Tahun" /> 6 - 10 Tahun
                      <input type="radio" name="responden_masa_kerja" class="form-control" value="> 10 Tahun" /> > 10 Tahun
                    </div>
                    
                    <div class="form-group">
                      <label>Status Sosial</label>
                      <input type="radio" name="responden_status_sosial" class="form-control" value="Menikah" /> Menikah
                      <input type="radio" name="responden_status_sosial" class="form-control" value="Belum Menikah" /> Belum Menikah
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
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



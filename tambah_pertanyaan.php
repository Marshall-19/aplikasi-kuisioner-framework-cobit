<?php
  require_once "lib/helper.php";
  require_once "models/KategoriPertanyaan.php";
  $kategori = new KategoriPertanyaan();
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
                  <form action="proses_tambah_pertanyaan.php" method="POST">
                    <div class="form-group">
                      <label>Isi Pertanyaan</label>
                      <textarea class="form-control" name="pertanyaan"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select name="kategori_id" class="form-control">
                        <option>Pilih Kategori</option>
                        <?php
                          $data_kategori = $kategori->ambilData();
                          foreach($data_kategori as $kat)
                          {
                        ?>
                          <option value="<?=$kat['kategori_id']?>"><?=$kat['kategori_nama']." ".$kat['kategori_keterangan']?></option>
                        <?php
                          }
                        ?>
                      </select>
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


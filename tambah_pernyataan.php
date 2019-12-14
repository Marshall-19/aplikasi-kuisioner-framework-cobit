<?php
  require_once "lib/helper.php";
  require_once "models/DomainPernyataan.php";
  $domain = new DomainPernyataan();
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
            <?php includeTemplate("sidebar.php"); ?>
            <div class="col-sm-9 col-xs-12">
              <div class="sale-statistic-inner">
                <div class="curved-inner-pro">
                  <div class="curved-ctn">
                    <!-- BAGIAN ISI KONTEN -->
                  <h2>Tambah Data Pernyataan</h2>
                  <form action="proses_tambah_pernyataan.php" method="POST">
                    <div class="form-group">
                      <label>Isi Pernyataan</label>
                      <textarea class="form-control" name="pernyataan"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Domain</label>
                      <select name="domain_id" class="form-control">
                        <option>Pilih Domain</option>
                        <?php
                          $data_domain = $domain->ambilData();
                          foreach($data_domain as $kat)
                          {
                        ?>
                          <option value="<?=$kat['domain_id']?>"><?=$kat['domain_nama']." ".$kat['domain_keterangan']?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-success" onclick="window.history.back();">Kembali</button>
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


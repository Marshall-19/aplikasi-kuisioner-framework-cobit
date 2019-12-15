<?php
  session_start();
  require_once "lib/helper.php";
  cekLogin();
  require_once "models/DomainPernyataan.php";
  require_once "models/Pernyataan.php";
  $domain = new DomainPernyataan();
  $data_domain = $domain->ambilData();
  
  $pernyataan = new Pernyataan();
  $detail_domain = $pernyataan->ambilData($_GET['pernyataan_id']);
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
                    <h2>Edit Pernyataan</h2>
                    <form action="proses_edit_pernyataan.php" method="POST">
                      <input type="hidden" name="pernyataan_id" value="<?=$detail_domain['pernyataan_id']?>" />
                      <div class="form-group">
                        <label>Isi Pernyataan</label>
                        <textarea class="form-control" name="pernyataan"><?=$detail_domain['pernyataan']?></textarea>
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
                        <script>
                          document.getElementsByName("domain_id")[0].value = "<?=$detail_domain['domain_id']?>";  
                        </script>
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-success btn-sm" onclick="window.history.back();">Kembali</button>
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


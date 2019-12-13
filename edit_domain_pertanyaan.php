<?php
require_once "lib/helper.php";
require_once "models/DomainPertanyaan.php";
$domain = new DomainPertanyaan();
$domain_id = $_GET['domain_id'];
$detail_domain = $domain->ambilData($domain_id);
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
                      <form action="proses_edit_domain_pertanyaan.php" method="POST">
                        <input type="hidden" name="domain_id" value="<?=$detail_domain['domain_id']?>" />
                        <div class="form-group">
                          <label>Nama Domain</label>
                          <input type="text" name="domain_nama" class="form-control" value="<?=$detail_domain['domain_nama']?>" />
                        </div>
                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" name="domain_keterangan" class="form-control" value="<?=$detail_domain['domain_keterangan']?>"  />
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



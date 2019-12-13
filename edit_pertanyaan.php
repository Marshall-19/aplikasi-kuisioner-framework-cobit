<?php
  require_once "lib/helper.php";
  require_once "models/DomainPertanyaan.php";
  require_once "models/Pertanyaan.php";
  $domain = new DomainPertanyaan();
  $data_domain = $domain->ambilData();
  
  $pertanyaan = new Pertanyaan();
  $detail_domain = $pertanyaan->ambilData($_GET['pertanyaan_id']);
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
                    <form action="proses_edit_pertanyaan.php" method="POST">
                      <input type="hidden" name="pertanyaan_id" value="<?=$detail_domain['pertanyaan_id']?>" />
                      <div class="form-group">
                        <label>Isi Pertanyaan</label>
                        <textarea class="form-control" name="pertanyaan"><?=$detail_domain['pertanyaan']?></textarea>
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


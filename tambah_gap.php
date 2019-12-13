<?php
  require_once "lib/helper.php";
  require_once "models/DomainPertanyaan.php";
  $domain = new DomainPertanyaan();
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
                    <h2>Perhitungan Nilai GAP</h2>
                  <button class="btn btn-success btn-sm" onclick="window.history.back();">Kembali</button>
                  <form action="proses_tambah_pertanyaan.php" method="POST">
                    <div class="form-group">
                      <label>Id Domain</label>
                      <select name="domain_id" class="form-control">
                        <option>Pilih Domain</option>
                        <?php
                          $data_domain = $domain->ambilData();
                          foreach($data_domain as $kat)
                          {
                        ?>
                          <option value="<?=$kat['domain_id']?>"><?=$kat['domain_nama']?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Indeks Maturity</label>
                      <input type="number" name="indeks_maturiy" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Harapan</label>
                      <input type="number" name="harapan" value="5" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>GAP</label>
                      <input type="number" name="gap" class="form-control" />
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
    <script>
      function hitungGap()
      {
        var im = document.getElementsByName("indeks_maturiy")[0].value;
        var harapan = 5;
        var gap = 0;
        
        if(!isNaN(im))
        {
          gap = harapan - im;
        }
        document.getElementsByName("gap")[0].value = gap;
      }
      
      document.getElementsByName("indeks_maturiy")[0].addEventListener("change", hitungGap);
    </script>
</body>

</html>


<?php
  session_start();
  require_once "lib/helper.php";
  cekLogin();
  require_once "models/IndeksMaturity.php";
  $domain = new IndeksMaturity();
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
                    <h2>Tambah Nilai GAP</h2>
                  <form action="proses_tambah_gap.php" method="POST">
                    <div class="form-group">
                      <label>Id Domain</label>
                      <select name="indeks_id" class="form-control">
                        <option>Pilih Domain</option>
                        <?php
                          $data_domain = $domain->ambilData();
                          foreach($data_domain as $kat)
                          {
                        ?>
                          <option value="<?=$kat['indeks_id']?>"><?=$kat['domain_nama']?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Indeks Maturity</label>
                      <input type="text" name="indeks_maturity" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>Harapan</label>
                      <input type="number" name="harapan" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>GAP</label>
                      <input type="text" name="gap" class="form-control" readonly />
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
    <script>
      function ambilDataDomain() {
        var data_domain = <?=json_encode($data_domain)?>;
        var indeks_id = document.getElementsByName("indeks_id")[0].selectedIndex - 1;
        if(indeks_id >= 0)
        {
          document.getElementsByName("indeks_maturity")[0].value = data_domain[indeks_id].indeks_maturity;
          document.getElementsByName("gap")[0].value = data_domain[indeks_id].gap;
          document.getElementsByName("harapan")[0].value = 5;
          hitungGap();
        }
        else
        {
          document.getElementsByName("indeks_maturity")[0].value = 0;
          document.getElementsByName("gap")[0].value = 0;
          document.getElementsByName("harapan")[0].value = 0;
        }
        
      }
      function hitungGap()
      {
        var im = document.getElementsByName("indeks_maturity")[0].value;
        var harapan = 5;
        var gap = 0;
        
        if(!isNaN(im))
        {
          gap = harapan - im;
        }
        document.getElementsByName("gap")[0].value = gap;
      }
      
      document.getElementsByName("indeks_id")[0].addEventListener("change", ambilDataDomain);
    </script>
</body>

</html>


<?php
  session_start();
  require_once "lib/helper.php";
  cekLogin();
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
                    <h2>Tambah Indeks Maturity</h2>
                  <form action="proses_tambah_indeks_maturity.php" method="POST">
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
                      <label>Total Pernyataan</label>
                      <input type="number" name="pernyataan_total" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>Jumlah Responden</label>
                      <input type="number" name="responden_total" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>Jumlah Nilai</label>
                      <input type="number" name="nilai_total" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>Pernyataan X Responden</label>
                      <input type="number" name="pernyataan_responden" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                      <label>Indeks Maturity</label>
                      <input type="text" name="indeks_maturity" class="form-control" readonly />
                    </div>
                    
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" readonly />
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
        var domain_id = document.getElementsByName("domain_id")[0].value;
        axios.get("ajax_ambil_data_domain.php?domain_id=" + domain_id)
          .then(function(res){
            document.getElementsByName("pernyataan_total")[0].value = res.data.pernyataan_total;
            document.getElementsByName("responden_total")[0].value = res.data.responden_total;
            document.getElementsByName("nilai_total")[0].value = res.data.skor_total;
            document.getElementsByName("pernyataan_responden")[0].value = res.data.pernyataan_total * res.data.responden_total;
            
            hitungIndeksMaturity();
          })
      }
      function hitungIndeksMaturity()
      {
        var im = 0;
        var jumlah_nilai = document.getElementsByName("nilai_total")[0].value || 0;
        var jumlah_pernyataan = document.getElementsByName("pernyataan_total")[0].value || 0;
        var jumlah_responden = document.getElementsByName("responden_total")[0].value || 0;
        var keterangan = "";
        
        if(!isNaN(jumlah_nilai) && !isNaN(jumlah_pernyataan) && !isNaN(jumlah_responden))
        {
          im = jumlah_nilai / (jumlah_pernyataan*jumlah_responden);
        }
        
        if(im >= 0 && im <= 0.49)
        {
          keterangan = "Tidak Ada";
        }
        else if(im >= 0.50 && im <= 1.49)
        {
          keterangan = "Inisialisasi";
        }
        else if(im >= 1.50 && im <= 2.49)
        {
          keterangan = "Dapat Diulang";
        }
        else if(im >= 2.50 && im <= 3.49)
        {
          keterangan = "Ditetapkan";
        }
        else if(im >= 3.50 && im <= 4.49)
        {
          keterangan = "Terkelola";
        }
        else if(im >= 4.50 && im <= 5)
        {
          keterangan = "Optimal";
        }
        
        document.getElementsByName("indeks_maturity")[0].value = im;
        document.getElementsByName("keterangan")[0].value = keterangan;
      }
      
      document.getElementsByName("domain_id")[0].addEventListener("change", ambilDataDomain);  
    </script>
</body>

</html>


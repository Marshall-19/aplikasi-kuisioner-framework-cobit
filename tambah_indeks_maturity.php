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
                    <h2>Perhitungan Indeks Maturity</h2>
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
                      <label>Total Pertanyaan</label>
                      <input type="number" name="pertanyaan_total" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Jumlah Responden</label>
                      <input type="number" name="responden_total" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Jumlah Nilai</label>
                      <input type="number" name="nilai_jumlah" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Pertanyaan X Responden</label>
                      <input type="number" name="pertanyaan_responden" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Indeks Maturity</label>
                      <input type="number" name="indeks_maturiy" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" />
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
      function hitungIndeksMaturity()
      {
        var im = 0;
        var jumlah_nilai = document.getElementsByName("nilai_jumlah")[0].value || 0;
        var jumlah_pertanyaan = document.getElementsByName("pertanyaan_total")[0].value || 0;
        var jumlah_responden = document.getElementsByName("responden_total")[0].value || 0;
        var keterangan = "";
        
        if(!isNaN(jumlah_nilai) && !isNaN(jumlah_pertanyaan) && !isNaN(jumlah_responden))
        {
          im = jumlah_nilai / (jumlah_pertanyaan*jumlah_responden);
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
        
        document.getElementsByName("indeks_maturiy")[0].value = im;
        document.getElementsByName("keterangan")[0].value = keterangan;
      }
      
      document.getElementsByName("pertanyaan_total")[0].addEventListener("keyup", hitungIndeksMaturity);   
      document.getElementsByName("responden_total")[0].addEventListener("keyup", hitungIndeksMaturity);   
      document.getElementsByName("nilai_jumlah")[0].addEventListener("keyup", hitungIndeksMaturity);   
      document.getElementsByName("pertanyaan_responden")[0].addEventListener("keyup", hitungIndeksMaturity);   
    </script>
</body>

</html>


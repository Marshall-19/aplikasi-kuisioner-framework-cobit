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
                    <div class="bsc-tbl-st">
                    <!-- BAGIAN ISI KONTEN -->
                  <a href="tambah_kategori_pertanyaan.php" class="btn btn-primary btn-sm">Tambah Kategori Baru</a>
                  <table style="width: 100%;"  class="table table-bordered table-stripped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // ambil data kategori
                      $data_kategori = $kategori->ambilData();
                      // menampilkan data
                      foreach($data_kategori as $no => $kat)
                      {
                    ?>
                    
                      <tr>
                        <td><?=$no+1?></td>
                        <td><?=$kat['kategori_nama']?></td>
                        <td><?=$kat['kategori_keterangan']?></td>
                        <td>
                          <a href="edit_kategori_pertanyaan.php?kategori_id=<?=$kat['kategori_id']?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="proses_hapus_kategori_pertanyaan.php?kategori_id=<?=$kat['kategori_id']?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                      </tr>
                    
                  <?php
                      }
                  ?>
                  </tbody>
                  </table>
                  <!-- EOF BAGIAN ISI KONTEN -->
                  </div>
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


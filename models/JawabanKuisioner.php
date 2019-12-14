<?php
require_once "models.php";
class JawabanKuisioner extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_jawaban_kuisioner";
    $this->primaryKey = "jawaban_id";
    $this->kolomBawaanCrud = [
      "kuisioner_id",
      "skor",
      "pernyataan_id",
    ];
    // daftar kolom pada tabel kecuali primary keynya
    //~ $this->view = "data_kuisioner";
   
  }
}

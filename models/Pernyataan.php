<?php
require_once "models.php";
class Pernyataan extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_pernyataan";
    $this->primaryKey = "pernyataan_id";
    $this->kolomBawaanCrud = ["pernyataan", "domain_id"]; // daftar kolom pada tabel kecuali primary keynya
    $this->view = "data_pernyataan";
  }
}

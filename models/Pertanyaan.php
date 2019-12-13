<?php
require_once "models.php";
class Pertanyaan extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_pertanyaan";
    $this->primaryKey = "pertanyaan_id";
    $this->kolomBawaanCrud = ["pertanyaan", "domain_id"]; // daftar kolom pada tabel kecuali primary keynya
    $this->view = "data_pertanyaan";
  }
}

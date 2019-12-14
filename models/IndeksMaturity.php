<?php
require_once "models.php";
class IndeksMaturity extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_indeks_maturity";
    $this->primaryKey = "indeks_id";
    $this->kolomBawaanCrud = ["domain_id", "pertanyaan_total", "responden_total", "nilai_total", "indeks_maturity", "keterangan"];
    $this->view = "data_indeks_maturity";
  }
}

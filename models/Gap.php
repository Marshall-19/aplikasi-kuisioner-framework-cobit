<?php
require_once "models.php";
class Gap extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_gap";
    $this->primaryKey = "gap_id";
    $this->kolomBawaanCrud = ["indeks_id", "gap"];
    $this->view = "data_gap";
  }
}

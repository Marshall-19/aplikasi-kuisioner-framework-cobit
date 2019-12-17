<?php
require_once "models.php";
class Responden extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_responden";
    $this->primaryKey = "responden_id";
    $this->kolomBawaanCrud = [
      "responden_no"
     ]; // daftar kolom pada tabel kecuali primary keynya
    // $this->view = "data_pernyataan";
   
  }
}

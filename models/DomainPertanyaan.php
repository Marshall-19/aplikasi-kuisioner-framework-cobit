<?php
require_once "models.php";
class DomainPertanyaan extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_domain_pertanyaan";
    $this->primaryKey = "domain_id";
    $this->kolomBawaanCrud = ["domain_nama", "domain_keterangan"];
    /*
    tambahkan kode dibawah ini jika kita ingin memakai view pada tabel atau model ini
    $this->view = "daftar_domain";
    */
   
  }
}

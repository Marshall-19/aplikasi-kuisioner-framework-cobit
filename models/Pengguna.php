<?php
require_once "models.php";
class Pengguna extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_pengguna";
    $this->primaryKey = "pengguna_id";
    $this->kolomBawaanCrud = ["pengguna_username", "pengguna_password", "pengguna_email"];
  }
}

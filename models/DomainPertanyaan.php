<?php
require_once "models.php";
class DomainPernyataan extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_domain";
    $this->primaryKey = "domain_id";
    $this->kolomBawaanCrud = ["domain_nama", "domain_keterangan"];
    /*
    tambahkan kode dibawah ini jika kita ingin memakai view pada tabel atau model ini
    $this->view = "daftar_domain";
    */
   
  }
  
  public function detailDataDomain($domain_id) {
    return $this->db->query("Select
                                  COUNT(distinct tbl_kuisioner.responden_id) AS responden_total,
                                  SUM(tbl_jawaban_kuisioner.skor) AS skor_total,
                                  tbl_domain_pernyataan.domain_keterangan,
                                  tbl_domain_pernyataan.domain_nama,
                                  tbl_domain_pernyataan.domain_id,
                                  COUNT(distinct tbl_jawaban_kuisioner.pernyataan_id) AS pernyataan_total 
                              From
                                  tbl_kuisioner Inner Join
                                  tbl_jawaban_kuisioner On tbl_jawaban_kuisioner.kuisioner_id = tbl_kuisioner.kuisioner_id Inner Join
                                  tbl_pernyataan On tbl_jawaban_kuisioner.pernyataan_id = tbl_pernyataan.pernyataan_id Inner Join
                                  tbl_domain_pernyataan On tbl_pernyataan.domain_id = tbl_domain_pernyataan.domain_id WHERE tbl_domain_pernyataan.domain_id = :domain_id  
                              GROUP BY tbl_domain_pernyataan.domain_id;", ["domain_id" => $domain_id])->fetch(PDO::FETCH_ASSOC);
  }
}

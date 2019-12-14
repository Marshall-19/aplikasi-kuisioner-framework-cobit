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
  
  public function detailDataDomain($domain_id) {
    return $this->db->query("Select
                                  COUNT(distinct tbl_kuisioner.responden_id) AS responden_total,
                                  SUM(tbl_jawaban_kuisioner.skor) AS skor_total,
                                  tbl_domain_pertanyaan.domain_keterangan,
                                  tbl_domain_pertanyaan.domain_nama,
                                  tbl_domain_pertanyaan.domain_id,
                                  COUNT(distinct tbl_jawaban_kuisioner.pertanyaan_id) AS pertanyaan_total 
                              From
                                  tbl_kuisioner Inner Join
                                  tbl_jawaban_kuisioner On tbl_jawaban_kuisioner.kuisioner_id = tbl_kuisioner.kuisioner_id Inner Join
                                  tbl_pertanyaan On tbl_jawaban_kuisioner.pertanyaan_id = tbl_pertanyaan.pertanyaan_id Inner Join
                                  tbl_domain_pertanyaan On tbl_pertanyaan.domain_id = tbl_domain_pertanyaan.domain_id WHERE tbl_domain_pertanyaan.domain_id = :domain_id  
                              GROUP BY tbl_domain_pertanyaan.domain_id;", ["domain_id" => $domain_id])->fetch(PDO::FETCH_ASSOC);
  }
}

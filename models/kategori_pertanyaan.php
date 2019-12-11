require_once "models.php";
class KategoriPertanyaan extends Models {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tbl_kategori_pertanyaan";
    $this->primaryKey = "kategori_id";
    $this->kolomBawaanCrud = ["kategori_nama", "kategori_keterangan"];
    /*
    tambahkan kode dibawah ini jika kita ingin memakai view pada tabel atau model ini
    $this->view = "daftar_kategori";
    */
   
  }
}

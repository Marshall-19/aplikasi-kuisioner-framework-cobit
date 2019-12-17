<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "database.php";
use Medoo\Medoo;
class Models {
	protected $db;
  public $tabel;      // nama tabelnya
  protected $primaryKey; // primary keynya
  protected $relasiTabel; // relasi tabel array
  public $kolomBawaanCrud; // kolom bawaan crud array
  public $data = [];
  public $view = null;
  function __construct()
  {
    // pengaturan database
    $this->db = new Medoo([
      'database_type' => 'mysql',
      'database_name' => 'mandanon_cobit',
      'server' => 'localhost',
      'username' => 'mandanon_cobit',
      'password' => 'qwe123*IOP'
    ]);
  }
 
  /*
    ambilData(3, ["username", "password", "level"]);
    kode diatas berarti mengambil data dengan id = 3 dan ambil kolom username, password dan level
    
    ambilData()
    kode diatas berarti mengambil seluruh data dan seluruh kolom
  */
  public function ambilData($id = null, $kolom = "*")
	{
		$tabel = $this->tabel;
    if(!empty($this->view))
    {
      $tabel = $this->view;
    }
    if(!is_null($id))
    {
      return $this->db->get($tabel, $kolom, [$this->primaryKey => $id]);
    }
    else
    {
      return $this->db->select($tabel, $kolom);
    }
	}
  
  /*
    ambilDataDenganKondisi(["username" => "madam", "password" => "123"], ["username"])
    kode diatas berarti ambil data dimana username = madam dan password = 123 serta tampilkan saja kolom username
    
    ambilDataDenganKondisi(["username" => "madam", "password" => "123"])
    kode diatas berarti ambil data dimana username = madam dan password = 123 serta tampilkan semua kolom
    
  */
	public function ambilDataDenganKondisi($where, $kolom = "*")
	{
    $tabel = $this->tabel;
    if(!empty($this->view))
    {
      $tabel = $this->view;
    }
    return $this->db->select($tabel, $kolom, $where);
	}
  
  /*
    tambahData([
    	"username" => $_POST['username'],
	"password" => $_POST['password']
    ])
    tambah data tabel dengan data diatas
  */
  public function tambahData($data)
  {
    foreach($this->kolomBawaanCrud as $d)
    {
      $this->data[$d] = $data[$d];
    }
    $this->db->insert($this->tabel, $this->data);
    return $this->db->id();
  }
  
  /*
    editData(12,[
    	"username" => $_POST['username'],
	"password" => $_POST['password']
    ])
    edit data dengan kolom diatas dimana id = 12
  */
  public function editData($id, $data)
  {
    foreach($this->kolomBawaanCrud as $d)
    {
      $this->data[$d] = $data[$d];
    }
    $this->db->update($this->tabel, $this->data, [$this->primaryKey => $id]);
    return true;
  }
  
  /*
    hapusData(12)
    hapus data dengan id = 12
  */
  public function hapusData($id)
  {
    $this->db->delete($this->tabel, [$this->primaryKey => $id]);
    return true;
  }
}

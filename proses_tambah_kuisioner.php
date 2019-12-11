<?php
require_once "models/Responden.php";
require_once "models/Kuisioner.php";
require_once "models/JawabanKuisioner.php";

$responden = new Responden();
$kuisioner = new Kuisioner();
$jawaban_kuisioner = new JawabanKuisioner();

$responden_id = $responden->tambahData([
  "responden_nama" => $_POST['responden_nama'],
  "responden_usia" => $_POST['responden_usia'],
  "responden_jk" => $_POST['responden_jk'],
  "responden_pendidikan" => $_POST['responden_pendidikan'],
  "responden_masa_kerja" => $_POST['responden_masa_kerja'],
  "responden_status_sosial" => $_POST['responden_status_sosial'],
]);

$kuisioner_id = $kuisioner->tambahData([
  "responden_id" => $responden_id,
  "kuisioner_tgl" => date("Y-m-d"),
  "kuisioner_kode" => $_POST['kuisioner_kode']
]);

$data_pertanyaan = $_POST['pertanyaan_id'];

foreach($data_pertanyaan as $no => $pet)
{
  $skor = "skor".$pet;
  $jawaban_kuisioner->tambahData(["kuisioner_id" => $kuisioner_id, "pertanyaan_id" => $pet, "skor" => $_POST[$skor]]);
}

header("Location: tampil_kuisioner.php");
?>

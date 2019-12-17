<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Responden.php";
require_once "models/Kuisioner.php";
require_once "models/JawabanKuisioner.php";

$responden = new Responden();
$kuisioner = new Kuisioner();
$jawaban_kuisioner = new JawabanKuisioner();

$responden_id = $responden->tambahData([
  "responden_no" => $_POST['responden_no']
]);

$kuisioner_id = $kuisioner->tambahData([
  "responden_id" => $responden_id,
  "kuisioner_tgl" => date("Y-m-d")
]);

$data_pernyataan = $_POST['pernyataan_id'];

foreach($data_pernyataan as $no => $pet)
{
  $skor = "skor".$pet;
  $jawaban_kuisioner->tambahData(["kuisioner_id" => $kuisioner_id, "pernyataan_id" => $pet, "skor" => $_POST[$skor]]);
}

header("Location: tampil_kuisioner.php");
?>

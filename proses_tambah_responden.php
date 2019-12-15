<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Responden.php";
$responden = new Responden();
$responden->tambahData([
  "responden_no" => $_POST['responden_no'],
  "responden_usia" => $_POST['responden_usia'],
  "responden_jk" => $_POST['responden_jk'],
  "responden_pendidikan" => $_POST['responden_pendidikan'],
  "responden_masa_kerja" => $_POST['responden_masa_kerja'],
  "responden_status_sosial" => $_POST['responden_status_sosial'],
]);
header("Location: tampil_responden.php");
?>

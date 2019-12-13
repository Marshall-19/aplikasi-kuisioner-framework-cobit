<?php
require_once "models/Pertanyaan.php";
$pertanyaan = new Pertanyaan();
$pertanyaan->tambahData([
  "pertanyaan" => $_POST['pertanyaan'],
  "domain_id" => $_POST['domain_id'],
]);
header("Location: tampil_pertanyaan.php");
?>

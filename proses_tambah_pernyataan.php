<?php
require_once "models/Pernyataan.php";
$pernyataan = new Pernyataan();
$pernyataan->tambahData([
  "pernyataan" => $_POST['pernyataan'],
  "domain_id" => $_POST['domain_id'],
]);
header("Location: tampil_pernyataan.php");
?>

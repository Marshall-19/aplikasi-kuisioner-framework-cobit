<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Pernyataan.php";
$pernyataan = new Pernyataan();
$pernyataan->tambahData([
  "pernyataan" => $_POST['pernyataan'],
  "domain_id" => $_POST['domain_id'],
]);
header("Location: tampil_pernyataan.php");
?>

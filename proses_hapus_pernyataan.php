<?php
require_once "models/Pernyataan.php";
$pernyataan = new Pernyataan();
$pernyataan->hapusData($_GET['pernyataan_id']);
header("Location: tampil_pernyataan.php");
?>

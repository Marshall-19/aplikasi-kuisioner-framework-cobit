<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Pernyataan.php";
$pernyataan = new Pernyataan();
$pernyataan->hapusData($_GET['pernyataan_id']);
header("Location: tampil_pernyataan.php");
?>

<?php
require_once "models/IndeksMaturity.php";

$indeks_maturity = new IndeksMaturity();
$indeks_id = $_GET['indeks_id'];
$indeks_maturity->hapusData($indeks_id);

header("Location: tampil_indeks_maturity.php");
?>

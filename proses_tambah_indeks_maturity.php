<?php
require_once "models/IndeksMaturity.php";

$indeks_maturity = new IndeksMaturity();

$indeks_maturity->tambahData($_POST);

header("Location: tampil_indeks_maturity.php");
?>

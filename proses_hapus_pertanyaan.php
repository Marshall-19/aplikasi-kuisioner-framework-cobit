<?php
require_once "models/Pertanyaan.php";
$pertanyaan = new Pertanyaan();
$pertanyaan->hapusData($_GET['pertanyaan_id']);
header("Location: tampil_pertanyaan.php");
?>

<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Gap.php";
$gap = new Gap();
$gap_id = $_GET['gap_id'];
$gap->hapusData($gap_id);

header("Location: tampil_gap.php");
?>

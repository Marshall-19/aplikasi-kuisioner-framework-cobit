<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Gap.php";

$gap = new Gap();

$gap->tambahData($_POST);

header("Location: tampil_gap.php");
?>

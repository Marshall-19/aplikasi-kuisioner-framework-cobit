<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/DomainPernyataan.php";
$domain = new DomainPernyataan();
$domain->hapusData($_GET['domain_id']);
header("Location: tampil_domain_pernyataan.php");
?>

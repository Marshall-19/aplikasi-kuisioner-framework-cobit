<?php
require_once "models/DomainPernyataan.php";
$domain = new DomainPernyataan();
$domain->hapusData($_GET['domain_id']);
header("Location: tampil_domain_pernyataan.php");
?>

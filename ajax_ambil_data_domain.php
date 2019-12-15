<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/DomainPernyataan.php";
$domain = new DomainPernyataan();
$domain_id = $_GET['domain_id'];
echo json_encode($domain->detailDataDomain($domain_id));
?>

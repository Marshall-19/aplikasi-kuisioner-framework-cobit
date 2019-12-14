<?php
require_once "lib/helper.php";
require_once "models/DomainPertanyaan.php";
$domain = new DomainPertanyaan();
$domain_id = $_GET['domain_id'];
echo json_encode($domain->detailDataDomain($domain_id));
?>

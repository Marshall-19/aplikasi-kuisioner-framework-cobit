<?php
require_once "models/DomainPertanyaan.php";
$domain = new DomainPertanyaan();
$domain->hapusData($_GET['domain_id']);
header("Location: tampil_domain_pertanyaan.php");
?>

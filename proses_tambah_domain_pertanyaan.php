<?php
require_once "models/DomainPertanyaan.php";
$domain = new DomainPertanyaan();
$domain->tambahData([
  "domain_nama" => $_POST['domain_nama'],
  "domain_keterangan" => $_POST['domain_keterangan'],
]);
header("Location: tampil_domain_pertanyaan.php");
?>

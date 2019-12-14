<?php

require_once "models/DomainPernyataan.php";
$domain = new DomainPernyataan();

// contoh tambah data
$domain->tambahData([
  "domain_nama" => "ME 1",
  "domain_keterangan" => "Kualitas Madam",
]);

// ambil data domain
$data_domain = $domain->ambilData();

// menampilkan data
foreach($data_domain as $no => $kat)
{
  echo $kat['domain_id'];
  echo $kat['domain_nama'];
  echo $kat['domain_keterangan'];
}


// contoh edit data
$id = 1;
$domain->editData($id, [
  "domain_nama" => "ME 22",
  "domain_keterangan" => "Kualitas Kampret",
]);

// contoh hapus data
$id = 1;
$domain->hapusData($id);


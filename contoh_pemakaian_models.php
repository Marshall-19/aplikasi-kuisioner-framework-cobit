<?php

require_once "models/KategoriPertanyaan.php";
$kategori = new KategoriPertanyaan();

// contoh tambah data
$kategori->tambahData([
  "kategori_nama" => "ME 1",
  "kategori_keterangan" => "Kualitas Madam",
]);

// ambil data kategori
$data_kategori = $kategori->ambilData();

// menampilkan data
foreach($data_kategori as $no => $kat)
{
  echo $kat['kategori_id'];
  echo $kat['kategori_nama'];
  echo $kat['kategori_keterangan'];
}


// contoh edit data
$id = 1;
$kategori->editData($id, [
  "kategori_nama" => "ME 22",
  "kategori_keterangan" => "Kualitas Kampret",
]);

// contoh hapus data
$id = 1;
$kategori->hapusData($id);


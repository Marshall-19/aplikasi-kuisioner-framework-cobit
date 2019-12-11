<?php

require_once "models/KategoriPertanyaan.php";
$kategori = new KategoriPertanyaan();

// ambil data kategori
$data_kategori = $kategori->ambilData();

// menampilkan data
foreach($data_kategori as $no => $kategori)
{
  echo $kategori['kategori_id'];
  echo $kategori['kategori_nama'];
  echo $kategori['kategori_keterangan'];
}

// contoh tambah data
$kategori->tambahData([
  "kategori_nama" => $_POST['kategori_nama'],
  "kategori_keterangan" => $_POST['kategori_keterangan'],
]);

// contoh edit data
$id = 12;
$kategori->tambahData($id, [
  "kategori_nama" => $_POST['kategori_nama'],
  "kategori_keterangan" => $_POST['kategori_keterangan'],
]);

// contoh hapus data
$id = 10;
$kategori->hapusData($id);


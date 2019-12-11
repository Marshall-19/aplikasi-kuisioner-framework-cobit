<?php
require_once "models/KategoriPertanyaan.php";
$kategori = new KategoriPertanyaan();
$kategori->tambahData([
  "kategori_nama" => $_POST['kategori_nama'],
  "kategori_keterangan" => $_POST['kategori_keterangan'],
]);
header("Location: tampil_kategori_pertanyaan.php");
?>

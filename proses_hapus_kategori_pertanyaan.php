<?php
require_once "models/KategoriPertanyaan.php";
$kategori = new KategoriPertanyaan();
$kategori->hapusData($_GET['kategori_id']);
header("Location: tampil_kategori_pertanyaan.php");
?>

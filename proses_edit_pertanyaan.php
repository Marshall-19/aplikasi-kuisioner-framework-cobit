<?php
require_once "models/Pertanyaan.php";
$pertanyaan = new Pertanyaan();
$pertanyaan->editData($_POST['pertanyaan_id'],[
  "pertanyaan" => $_POST['pertanyaan'],
  "kategori_id" => $_POST['kategori_id'],
]);
header("Location: tampil_pertanyaan.php");
?>

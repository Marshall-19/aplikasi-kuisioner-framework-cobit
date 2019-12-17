<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Responden.php";
$responden = new Responden();
$responden->tambahData([
  "responden_no" => $_POST['responden_no']
]);
header("Location: tampil_responden.php");
?>

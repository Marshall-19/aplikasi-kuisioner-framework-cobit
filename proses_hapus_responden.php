<?php
require_once "models/Responden.php";
$responden = new Responden();
$responden->hapusData($_GET['responden_id']);
header("Location: tampil_responden.php");
?>

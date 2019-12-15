<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Pengguna.php";
$pengguna = new Pengguna();
$pengguna_id = $_GET['pengguna_id'];
$pengguna->hapusData($pengguna_id);

header("Location: tampil_pengguna.php");
?>

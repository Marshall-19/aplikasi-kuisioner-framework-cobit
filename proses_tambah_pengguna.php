<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Pengguna.php";

$pengguna = new Pengguna();

$pengguna->tambahData($_POST);

header("Location: tampil_pengguna.php");
?>

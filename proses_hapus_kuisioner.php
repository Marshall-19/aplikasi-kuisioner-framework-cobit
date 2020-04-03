<?php
session_start();
require_once "lib/helper.php";
cekLogin();
require_once "models/Kuisioner.php";
$kuisioner = new Kuisioner();
$kuisioner->hapusData($_GET['kuisioner_id']);
header("Location: tampil_kuisioner.php");
?>

<?php
  $url = explode("/", $_SERVER["REQUEST_URI"]);
  echo $url[count($url)-1];
?>

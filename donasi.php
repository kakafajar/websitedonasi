<?php

  require_once "/models/modelpembayaran.php";

  $title = "Donasi";

  if (isset($_POST['submit-donasi'])){
    // 
  }

  $models = ModelPembayaran::get_all();

  require_once "views/layout.php";
  require_once "views/donasi.php";

?>
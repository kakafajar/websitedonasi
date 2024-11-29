<?php

  require_once __DIR__ . "/models/modelpembayaran.php";
  require_once __DIR__ . "/models/transaksi.php";

  $title = "Donasi";
  
  $submit_model = '-1';
  if (isset($_GET['submit_model'])){
    $submit_model = $_GET['submit_model'];
  }

  if (isset($_POST['submit-donasi'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $idmodel = $_POST['metode_pembayaran'];
    $jumlah = $_POST['jumlah_donasi'];
    $pesan = $_POST['pesan'];

    date_default_timezone_set('Asia/Bangkok');
    Transaksi::insert([$nama, $email, $idmodel, $jumlah, $pesan, null, 'pending', date("Y-m-d H-i-s")]);
    header("Location:donasi.php?submit_model=$idmodel");
    exit;
  }

  $models = ModelPembayaran::get_all();

  require_once "views/layout.php";
  require_once "views/donasi.php";

?>
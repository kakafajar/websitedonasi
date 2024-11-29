<?php

    require_once __DIR__ . '/../models/transaksi.php';
    require_once __DIR__ . '/../models/modelpembayaran.php';

    $title = "Transaksi";
    $transactions = Transaksi::get_all();
    $models = ModelPembayaran::get_all();
    
    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/transaksi.php';
    
?>
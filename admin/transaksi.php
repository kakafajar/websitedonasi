<?php

    require_once __DIR__ . '/models/transaksi.php';

    $title = "Transaksi";
    $transactions = Transaksi::get_all();
    
    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/transaksi.php';
    
?>
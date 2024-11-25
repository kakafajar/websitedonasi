<?php

    require_once __DIR__ . '/models/modelpembayaran.php';

    $title = "Model Pembayaran";
    $models = ModelPembayaran::get_all();
    $model = null;

    if (isset($_GET['edit'])){
        $model = ModelPembayaran::get($_GET['edit']);
    }

    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/modelpembayaran.php';
?>
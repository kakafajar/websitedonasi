<?php 
    require_once __DIR__ . '/models/user.php';

    $title = "Users";
    $users = User::get_all();

    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/users.php';
?>
<?php 
    require_once __DIR__ . '/../models/user.php';

    if (isset($_GET['mode'])){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        switch ($_GET['mode']){
            case 'add':
                User::insert([$_POST['username'], $password]);
                break;
            case 'edit':
                User::update($_POST['id'], [$_POST['username'], $password]);
                break;
            case 'delete':
                User::delete($_GET['id']);
                break;
        }
        header("Location:" . basename(__FILE__, '.php') . ".php");
    }

    $title = "Users";
    $users = User::get_all();

    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/users.php';
?>
<?php 
    require_once __DIR__ . '/../models/user.php';

    if (isset($_GET['mode'])){
        $password = '';
        if (isset($_POST['password'])){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        switch ($_GET['mode']){
            case 'add':
                try{
                    User::insert([$_POST['username'], $password]);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'edit':
                try{
                    User::update($_POST['id'], [$_POST['username'], $password]);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'delete':
                try{
                    User::delete($_GET['id']);
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
            case 'deleteselected':
                try{
                    User::delete_from_array(json_decode($_POST['ids']));
                }
                catch(Exception $e){
                    http_response_code(500);
                    echo json_encode($conn->error);
                }
                break;
        }
        exit;
    }

    $title = "Users";
    $users = User::get_all();

    require_once __DIR__ . '/views/layout.php';
    require_once __DIR__ . '/views/users.php';
?>
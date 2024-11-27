<?php
    require_once __DIR__ . '/../models/user.php';
    
    $errormsg = "";
    
    if (isset($_POST['username'])){
        $users = User::get_all();
        $username = $_POST["username"];
        $password = $_POST["password"];

        foreach ($users as $user){
            if ( $username == $user->get_username() && password_verify($password, $user->get_password()) ){
                $_SESSION['user'] = serialize($user);

                header("Location: index.php");
                $errormsg = "benar";
                exit;
            }
        }
        $errormsg = "salah";
    }


    require_once './views/login.php';

?>


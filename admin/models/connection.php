<?php

    $dir = "localhost";
    $username = "root";
    $password = "";
    $dbname = "donasidb";

    $conn = new mysqli($dir, $username, $password, $dbname);

    session_start();

?>
<?php
    $host = "localhost";
    $login = "root";
    $password = "root";
    $db = "foundy";

    $connect = mysqli_connect($host, $login, $password, $db);

    if (!$connect) {
        die("Could not connect");
    }
?>
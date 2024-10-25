<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!($username == "tamanegi" && $password == "tamanegi")) {
        echo "Invalid username or password. Please try again.";
        header("Refresh: 3; Location: index.php");
        exit;
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: backOffice.php");
        exit;
    }
}

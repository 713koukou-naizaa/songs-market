<?php
include_once "db-config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $audioPath = $_POST['audio_path'];
    $iconPath = $_POST['icon_path'];

    $query = "INSERT INTO {$tableName} (id, title, artist, genre, price, audio_path, icon_path, duration)
    VALUES ('$id', '$title', '$artist', '$genre', '$price', '$audioPath', '$iconPath', null)";

    $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));

    header("Location: backOffice.php");
    exit;
}



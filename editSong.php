<?php
include_once "db-config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $icon_path = $_POST['icon_path'];
    $audio_path = $_POST['audio_path'];

    $query = "UPDATE {$tableName} SET title = '$title', artist = '$artist', genre = '$genre', price = '$price', icon_path = '$icon_path', audio_path = '$audio_path', duration = null WHERE id = $id";

    $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));

    header("Location: backOffice.php");
    exit;
}



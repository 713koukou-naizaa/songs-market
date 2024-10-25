<?php
include_once "db-config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM {$tableName} WHERE id = $id";
    $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));

    header("Location: backOffice.php");
    exit;
}



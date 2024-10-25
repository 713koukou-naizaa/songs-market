<?php
include_once "db-config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back office</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Back office</h1>

    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

    <form ACTION="deleteSong.php" METHOD="POST">
        <input type="text" placeholder="Song ID" name="id">
        <button class="defaultButton" type="submit">Delete song</button>
    </form>

    <form ACTION="addSong.php" METHOD="POST">
        <input type="text" placeholder="ID" name="id">
        <input type="text" placeholder="Title" name="title">
        <input type="text" placeholder="Artist" name="artist">
        <input type="text" placeholder="Genre" name="genre">
        <input type="text" placeholder="Price" name="price">
        <input type="text" placeholder="Audio path" name="audio_path">
        <input type="text" placeholder="Icon path" name="icon_path">
        <button class="defaultButton" type="submit">Add song</button>
    </form>

    <form ACTION="editSong.php" METHOD="POST">
        <input type="text" placeholder="ID" name="id">
        <input type="text" placeholder="Title" name="title">
        <input type="text" placeholder="Artist" name="artist">
        <input type="text" placeholder="Genre" name="genre">
        <input type="text" placeholder="Price" name="price">
        <input type="text" placeholder="Audio path" name="audio_path">
        <input type="text" placeholder="Icon path" name="icon_path">
        <button class="defaultButton" type="submit">Edit song</button>
    </form>

    <a href="index.php">Home</a>
</body>
</html>




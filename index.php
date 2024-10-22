<?php
include_once "db-config.php";
require_once 'vendor/james-heinrich/getid3/getid3/getid3.php';
// get songs infos from database
$query="SELECT * FROM {$tableName}";
$result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));
if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $rows = [];
}


// get songs duration from local files and store in database
$getID3 = new getID3();
foreach ($rows as $row) {
    $file = $row['audio_path'];
    $info = $getID3->analyze($file);

    $query = "UPDATE {$tableName} SET duration = '{$info['playtime_string']}' WHERE id = '{$row['id']}'";
    $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));

}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs market</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <audio autoplay><source src="assets/minato-aqua-hello.mp3" type="audio/mpeg"></audio>

    <h1>Songs</h1>
    <div class="container">
        <?php
        
        foreach ($rows as $row) {
            echo "<div class='open-modal songCard'>";
                $id = $row['id'];
                $title = $row['title'];
                $artist = $row['artist'];
                $price = $row['price'];
                $img_path = $row['icon_path'];
                $duration = $row['duration'];

                echo "<div class='songDetails'
                data-title='{$title}'
                data-artist='{$artist}'
                data-price='{$price}'
                data-img='{$img_path}'
                data-duration='{$duration}'>
                    Artist: {$artist}<br>Title: {$title}
                </div>";

                echo "<div class='songImg'>
                    <img class='thumbnail' src='{$img_path}' alt='{$title} icon'>
                </div>";
            echo "</div>";
        }
        ?>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="songDetailsModal"></h2>
            <img id="songImgModal" src="" alt="">
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>


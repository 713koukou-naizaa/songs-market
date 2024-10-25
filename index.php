<?php
include_once "db-config.php";
require_once 'vendor/james-heinrich/getid3/getid3/getid3.php';

// get songs infos from database
$query="SELECT * FROM {$tableName}";
$result = mysqli_query($conn, $query) or
die("Query failed: " . mysqli_error($conn));

if ($result->num_rows > 0) { $rows = $result->fetch_all(MYSQLI_ASSOC); }
else { $rows = []; }


// get songs duration from local files and store in database
$getID3 = new getID3();
foreach ($rows as $row) {
    $file = $row['audio_path'];
    $info = $getID3->analyze($file);

    if (isset($info['playtime_seconds'])) { $query = "UPDATE {$tableName} SET duration = '{$info['playtime_string']}' WHERE id = '{$row['id']}'"; }
    else { $query = "UPDATE {$tableName} SET duration = 0 WHERE id = '{$row['id']}'"; }
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
    <script src="index.js"></script>
</head>

<body>
    <audio autoplay><source src="assets/minato-aqua-hello.mp3" type="audio/mpeg"></audio>
    <header>
        <form ACTION="backOfficeEntry.php" METHOD="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
        <button class="defaultButton" type="submit">Login</button>
    </header>

    <!-- SONGS -->
    <h1>Songs</h1>
    <div class="container">
        <?php
        // if there are songs
        if($rows!=[])
        {
            foreach ($rows as $row) {
                echo "<div class='song'>";
                    // song card
                    echo "<div class='open-modal songCard'>";
                        // song details
                        $id = $row['id'];
                        $title = $row['title'];
                        $artist = $row['artist'];
                        $price = $row['price'];
                        $img_path = $row['icon_path'];
                        $duration = $row['duration'];
        
                        // song card with details using data attributes
                        // to pass the song details to modal with JS
                        echo "<div class='songDetails'
                        data-title='{$title}'
                        data-artist='{$artist}'
                        data-price='{$price}'
                        data-img='{$img_path}'
                        data-duration='{$duration}'>
                            Artist: {$artist}<br>Title: {$title}
                        </div>";

                        $resizedImageHeight=125;
                        $resizedImageWidth=$resizedImageHeight;
                        echo "<div class='songImg'>
                            <img class='thumbnail' src='resizeImage.php?file=$img_path&width={$resizedImageHeight}&height={$resizedImageHeight}' alt='{$title} icon'>
                        </div>";
                    echo "</div>";

                    // add to cart form
                    echo "<form class='addToCartForm'ACTION='addToCart.php' METHOD='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='number' name='quantity' min='1' max='999' value='1' oninput='this.value = Math.abs(this.value)'>
                                <input class ='defaultButton' type='submit' value='Add to cart' onclick=showAddToCartPopup()>
                            </form>";
                echo "</div>";
            }
        } else { echo "No songs found"; }
        ?>
    </div>

    <a href="cart.php">View cart</a>

    <!-- SONG DETAILS MODAL -->
    <!-- hidden by default -->
    <div id="songDetailsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="songDetailsModalTitle"></h2>
            <img id="songDetailsModalImg" src="" alt="">
        </div>
    </div>
</body>
</html>


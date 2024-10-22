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
    <script src="script.js"></script>
</head>

<body>
    <audio autoplay><source src="assets/minato-aqua-hello.mp3" type="audio/mpeg"></audio>

    <h1>Songs</h1>
    <div class="container">
        <?php
        if($rows!=[])
        {
            foreach ($rows as $row) {
                echo "<div class='song'>";
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

                    echo "<form ACTION='addToCart.php' METHOD='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input class ='addToCart' type='submit' value='Add to cart' onclick=showAddToCartPopup()>
                            </form>";
                echo "</div>";
            }
        } else { echo "No songs found"; }
        ?>
    </div>

    <a href="cart.php">View cart</a>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="songDetailsModal"></h2>
            <img id="songImgModal" src="" alt="">
        </div>
    </div>

    <div id="addToCartPopup" class="addToCartPopup">
        <div class="addToCartPopup-content">
            <span class="close">&times;</span>
            <p id="addToCartPopupText"></p>
        </div>
    </div>
</body>
</html>


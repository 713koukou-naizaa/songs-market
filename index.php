<?php

include_once "db-config.php";

$query="SELECT * FROM {$tableName}";
$result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));
if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $rows = [];
}

mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs Project</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <h1>Songs</h1>
    <div class="container">
        <?php
        foreach ($rows as $row) {
            echo "<div class='song'>";
            $id = $row['id'];
            $title = $row['title'];
            $artist = $row['artist'];
            $img_path = $row['icon_path'];
            echo "<img class='thumbnail' src='{$img_path}' alt='{$title} icon'>";
            echo "<span>{$id} - [{$artist}] {$title}</span>";
            echo "<button class='detailsButton open-modal'
            data-id='{$id}'
            data-title='{$title}'
            data-artist='{$artist}'>View Details</button>";
            echo "</div>";
        }
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>


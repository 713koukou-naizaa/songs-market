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
</head>

<body>
    <h1>Songs</h1>
    
    <?php if(!empty($rows)): ?>
        <ul>
            <?php foreach ($rows as $row): ?>
                <li class="item">
                    <?php echo $row['title'] . " - " . $row['artist']; ?>
                    <button class="clickable">View details</button>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>

    <script src="script.js"></script>
</body>
</html>


<?php
session_start();
include_once "db-config.php";

// get cart items
$cartItems = $_SESSION['cart'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <div>
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table class="cartTable">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPrice = 0;
                    foreach ($cartItems as $id => $quantity):
                        $query = "SELECT * FROM {$tableName} WHERE id = $id";
                        $result = $conn->query($query)->fetch_assoc();
                        $totalPrice += $result['price'] * $quantity;
                    ?>
                    <tr>
                        <td><?php echo $result['title']; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td>$<?php echo number_format($result['price'] * $quantity, 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Total Price: $<?php echo number_format($totalPrice, 2); ?></p>
        <?php endif; ?>
        <a href="index.php">Continue shopping</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>

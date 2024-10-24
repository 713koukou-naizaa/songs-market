<?php
include_once "db-config.php";

session_start();

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
    <script src="cart.js"></script>
</head>
<body>
    <!-- SHOPPING CART -->
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
                        <th>Remove</th>
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
                        <td><?php echo number_format($result['price'] * $quantity, 2); ?></td>
                        <td>
                            <form ACTION='removeFromCart.php' METHOD="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="number" name="quantity" min="0" max="999" value="<?php echo $quantity; ?>" oninput="this.value = Math.abs(this.value)">
                                <button class="defaultButton" type="submit">Update quantity</button>
                            </form>

                            <form ACTION='removeFromCart.php' METHOD="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="quantity" value="0">
                                <button class="defaultButton" type="submit">Remove all items</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Total Price: $<?php echo number_format($totalPrice, 2); ?></p>
        <?php endif; ?>
        <a href="index.php">Continue shopping</a>

        <!-- CHECKOUT BUTTON -->
        <!-- if cart is not empty, show -->
        <?php if (!empty($cartItems)): ?>
            <button class="defaultButton" type="submit" onclick=showCheckoutForm()>Checkout</button>
        <?php endif; ?>
    </div>

    <!-- CHECKOUT FORM -->
    <div id="checkoutForm" class="checkoutForm">
        <div class="checkoutFormContent">
            <h2>Checkout</h2>
            <form ACTION='processCheckout.php' METHOD="POST">
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                <br>
                <label for="creditCardNumber">Credit card number:</label>
                <input type="number" id="creditCardNumber" name="creditCardNumber" required>
                <br>
                <label for="expirationDate">Expiration date:</label>
                <input type="date" id="expirationDate" name="expirationDate" required>
                <br>
                <button class="defaultButton" type="submit">Confirm checkout</button>
            </form>
        </div>
    
</body>
</html>
<?php mysqli_close($conn); ?>

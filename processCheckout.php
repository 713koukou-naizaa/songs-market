
<?php
include_once "db-config.php";

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get payment information
    $creditCardNumber = $_POST['creditCardNumber'];
    $expirationDate = $_POST['expirationDate'];
    $totalPrice = $_POST['totalPrice'];

    // get current date and calculate limit date
    $expirationDate = new DateTime($expirationDate);
    $today = new DateTime();
    $limitDate = $today->add(new DateInterval('P3M'));
    
    // verify if credit car number is 16 digits long and the first and last digits are the same
    if (strlen($creditCardNumber) !== 16 ||
    substr($creditCardNumber, 0, 1) !== substr($creditCardNumber, -1))
    {
        echo "Invalid credit card number. It must be 16 digits long and the first and last digits must be the same. Please try again.";
    } elseif ($expirationDate < $limitDate) {
        // verify if expiration date is at least 3 months from today
        echo "Invalid expiration date. It must be at least 3 months from today. Please try again.";
    } else {
        // validate payment with confirmation message
        echo "Payment successful. Thank you for shopping with us.";
    }

    // redirect to index page after 3 seconds
    header("Refresh: 3; Location: index.php");
    exit;
}



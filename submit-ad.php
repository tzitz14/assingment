<?php

session_start();

define("MIN_PRICE", 50);
define("MAX_PRICE", 5000000);
define("MIN_SQUARE", 20);
define("MAX_SQUARE", 1000);

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    header("Location: index.php");
    exit;
}

// Validate the form data
if (!isset($_POST['price']) || !is_numeric($_POST['price']) || $_POST['price'] < MIN_PRICE || $_POST['price'] > MAX_PRICE) {
    echo "<script>
        alert('Please enter a valid price between " . MIN_PRICE . " and " . MAX_PRICE . " euro.');
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1500);
    </script>";
    exit;
}

if (!isset($_POST['square']) || !is_numeric($_POST['square']) || $_POST['square'] < MIN_SQUARE || $_POST['square'] > MAX_SQUARE) {
    echo "<script>
        alert('Please enter a valid area between " . MIN_SQUARE . " and " . MAX_SQUARE . " m2.');
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1500);
    </script>";
    exit;
}

if (!isset($_POST['region']) || empty($_POST['region'])) {
    echo "<script>
        alert('Please select a region.');
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1500);
    </script>";
    exit;
}

if (!isset($_POST['availability']) || empty($_POST['availability'])) {
    echo "<script>
        alert('Please select the availability of the property.');
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1500);
    </script>";
    exit;
}

// Include the database connection file
include 'database_connection.php';

// Get the form data
$price = $_POST['price'];
$region = $_POST['region'];
$availability = $_POST['availability'];
$square = $_POST['square'];
$username = $_SESSION['username'];

// Prepare the SQL statement
$sql = "INSERT INTO listings (region, price, availability, square, username)
VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind the parameters to the statement
$stmt->bind_param("sisis",$region, $price, $availability, $square, $username);

// Execute the statement
if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();

// Redirect the user back to the index page
header("Location: index.php");

?>

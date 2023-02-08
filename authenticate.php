<?php
include 'users.php';

// Get the inputted username and password
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the inputted username and password exist in the $users array
if (array_key_exists($username, $users) && $users[$username] == $password) {
    // If the username and password exist and match, set a session variable to indicate the user is logged in
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    // Redirect the user to the homepage
    header("Location: index.php");
} else {
    // If the username and password do not exist or do not match, redirect the user back to the login page
    header("Location: index.php");
}
?>

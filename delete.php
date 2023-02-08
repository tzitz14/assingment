<?php
session_start();

include_once 'database_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM listings WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('i', $id);
    if ($statement->execute()) {
        $_SESSION['message'] = "Listing successfully deleted";
    } else {
        $_SESSION['message'] = "Error deleting listing";
    }
    header('Location: index.php');
}
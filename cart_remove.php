<?php
require 'connection.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;
}
if(isset($_GET['id'])) {

    $users_item_id = $_GET['id'];
    $delete_query = "DELETE FROM users_items WHERE id = :id";
    $stmt = $pdo->prepare($delete_query);
    $stmt->execute(['id' => $users_item_id]);

    header('location: cart.php');
} else {

    echo "Error: id not provided!";
}
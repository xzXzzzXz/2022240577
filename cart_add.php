<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];

    // Dodavanje ID-a proizvoda u bazu podataka
    $user_id = $_SESSION['user_id'];
    $user_id1 = $_SESSION['id'];

    $insert_query = "INSERT INTO users_items (user_id, item_id) VALUES (:user_id, :item_id)";
    $stmt = $pdo->prepare($insert_query);
    $stmt->execute(['user_id' => $user_id, 'item_id' => $item_id]);

    // Preusmjeravanje korisnika na (cart.php)
    header('Location: cart.php');
} else {

    header('Location: index.php');
}
exit;
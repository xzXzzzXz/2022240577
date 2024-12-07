<?php
require 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        if ($password == $user['password']) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];

            header('Location: products.php');
            exit;
        } else {

            echo $email . '<br>';
            echo $password . '<br>';
            echo "Pogrešna lozinka. Molimo pokušajte ponovno.";
        }
    } else {

        echo "Korisnik s unesenim e-mailom nije pronađen. Molimo registrirajte se.";
    }
} else {

    header('Location: login.php');
    exit;
}

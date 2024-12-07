<?php
require 'connection.php';
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$contact = $_POST['contact'];
$city = $_POST['city'];
$address = $_POST['address'];

// Validacija e-maila
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Incorrect email format. Redirecting you back to registration page...";
    header("refresh:2; url=signup.php");
    exit;
}

// Validacija dužine lozinke
if (strlen($_POST['password']) < 6) {
    echo "Password should have at least 6 characters. Redirecting you back to registration page...";
    header("refresh:2; url=signup.php");
    exit;
}

// Provjera duplikata e-maila
$duplicate_user_query = "SELECT id FROM users WHERE email = ?";
$stmt = $pdo->prepare($duplicate_user_query);
$stmt->execute([$email]);
if ($stmt->rowCount() > 0) {
    echo "Email already exists in our database! Redirecting you back to registration page...";
    header("refresh:2; url=signup.php");
    exit;
}

// Unos korisnika u bazu podataka
$user_registration_query = "INSERT INTO users (name, email, password, contact, city, address) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($user_registration_query);
$stmt->execute([$name, $email, $password, $contact, $city, $address]);

echo "User successfully registered";
$_SESSION['email'] = $email;
$_SESSION['id'] = $pdo->lastInsertId(); // Dobivanje ID-a korisnika

header("refresh:3; url=products.php");
exit;
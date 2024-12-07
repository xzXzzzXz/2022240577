<?php
$host = 'localhost';
$dbname = 'store';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Greška prilikom povezivanja s bazom podataka: " . $e->getMessage());
}

<?php

// Uključivanje konekcije sa bazom podataka
require 'connection.php';

// Provera da li su podaci poslati HTTP POST metodom
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prihvatanje podataka iz forme
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $type = $_POST['type'];

    // Priprema upita za dodavanje proizvoda u bazu podataka
    $insert_query = "INSERT INTO items (name, price, img, type) VALUES (:name, :price, :img, :type)";
    $stmt = $pdo->prepare($insert_query);

    // Bindovanje vrednosti parametara
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':type', $type);

    // Izvršavanje upita
    if ($stmt->execute()) {
        // Uspesno dodavanje proizvoda
        echo "Product added successfully!";
    } else {
        // Greška prilikom dodavanja proizvoda
        echo "Error adding product.";
    }
} else {
    // Ako podaci nisu poslati putem HTTP POST metode, preusmeri korisnika na odgovarajuću stranicu
    header('Location: add_product_form.php');
    exit;
}


<?php
// Povezivanje s bazom podataka i dohvat svih proizvoda
require 'connection.php';
session_start()
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/wotlogo.jpg"/>
    <title>Lifestyle Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div>
    <?php
    require 'header.php';
    $sql = "SELECT * FROM items";
    $stmt = $pdo->query($sql);
    $statement = $pdo->query($sql);
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);


   ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="sort">Sort by:</label>
        <select name="sort" id="sort">
            <option value="price_asc">Price (Low to High)</option>
            <option value="price_desc">Price (High to Low)</option>
            <option value="name_asc">Name (A to Z)</option>
            <option value="name_desc">Name (Z to A)</option>
        </select>
        <button type="submit">Sort</button>
    </form>

    <br><br><br>
    <style>

        .thumbnail {
            height: 100%;
            border-radius: 4px;
            padding: 15px;
            text-align: center;
        }

        .thumbnail .image {
            max-width: 100%;
            height: 200px;
            display: block;
            margin: 0 auto;
        }
    </style>
    <?php

    $sort_by = isset($_POST['sort']) ? $_POST['sort'] : 'price_asc';

    // Logika za sortiranje prema ceni
    function sortByPrice($a, $b) {
        return $a["price"] - $b["price"];
    }

    // Logika za sortiranje po nazivu
    function sortByName($a, $b) {
        return strcmp($a["name"], $b["name"]);
    }

    // Logika za sortiranje
    if ($sort_by === 'price_asc') {
        usort($products, 'sortByPrice');
    } elseif ($sort_by === 'price_desc') {
        usort($products, function($a, $b) {
            return $b["price"] - $a["price"];
        });
    } elseif ($sort_by === 'name_asc') {
        usort($products, 'sortByName');
    } elseif ($sort_by === 'name_desc') {
        usort($products, function($a, $b) {
            return strcmp($b["name"], $a["name"]);
        });
    }
?>

    <h1>All Products</h1>
    <div>
        <?php
        foreach ($products as $item):
            $img = $item['img'];
            ?>

            <form method="post" action="cart_add.php">
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="cart.php">
                            <img class="image" src="img/<?php echo $img; ?>" alt="Tank">
                        </a>
                        <center>
                            <div class="caption">
                                <h3><?php echo $item['name']; ?></h3>
                                <p>Price: Rs.<?php echo $item['price'] ?></p>
                                <input type="hidden" name="item_id" value="<?php echo $item['id']?>">
                                <button type="submit" class="btn btn-danger" name="add_to_cart">Add to Cart</button>
                            </div>
                        </center>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>

    <br><br><br><br><br>
    <?php require 'footer.php'?>
</div>
</body>
</html>

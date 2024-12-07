<?php
require 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/wotlogo.jpg"/>
    <title>World of tanks</title>
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
    $sql = "SELECT * FROM items LIMIT 3"; // Dobijamo samo prva tri elementa iz baze
    $stmt = $pdo->query($sql);
    $statement = $pdo->query($sql);
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div id="bannerImage">
        <div class="container">
            <center>
                <div id="bannerContent">
                    <h1>World of Tanks</h1>
                    <p>Buy WOT tanks at a lower price</p>
                    <a href="products.php" class="btn btn-danger">Shop Now</a>
                </div>
            </center>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($products
            as $item): ?>

            <form method="post" action="cart_add.php">
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <img src="img/<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>">
                        </a>
                        <center>
                            <div class="caption">
                                <h3><?php echo $item['name']; ?></h3>
                                <p>Price: Rs.<?php echo $item['price'] ?></p>
                                <input type="hidden" name="item_id" value="<?php echo $item['id'] ?>">
                                <button type="submit" class="btn btn-danger" name="add_to_cart">Add to Cart</button>
                            </div>
                        </center>
                    </div>
                </div>
            </form>
                <?php endforeach; ?>

        </div>
    </div>

    <br><br> <br><br><br><br>
    <?php require 'footer.php' ?>
</div>
</body>
</html>
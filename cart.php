<?php
require 'connection.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

$user_id1 = $_SESSION['id'];
$user_id = $_SESSION['user_id'];
$user_products_query = "SELECT ut.id AS user_item_id, ut.status, it.id, it.name, it.price FROM users_items ut INNER JOIN items it ON it.id = ut.item_id WHERE ut.user_id = :user_id";
$stmt = $pdo->prepare($user_products_query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user_products_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$no_of_user_products = count($user_products_result);
$sum = 0;

if ($no_of_user_products == 0) {
    ?>
    <?php
} else {
    foreach ($user_products_result as $row) {
        $sum += $row['price'];
    }
}
?>
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
    <?php require 'header.php'; ?>
    <br>
    <div class="container">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>Item Number</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>status</th>
                <th></th>
            </tr>
            <?php
            $counter = 1;
            foreach ($user_products_result as $row) {
                ?>
                <tr>
                    <td><?php echo $counter ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><a href='cart_remove.php?id=<?php echo $row['user_item_id'] ?>'>Remove</a></td>
                </tr>
                <?php $counter++;
            } ?>
            <tr>
                <td></td>
                <th></th>
                <td>Total</td>
                <td>$ <?php echo $sum; ?></td>
                <td><a href="success.php?id=<?php echo $user_id ?>" class="btn btn-primary">Confirm Order</a></td>
            </tr>
            </tbody>
        </table>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <?php require 'footer.php'; ?>
</div>
</body>
</html>

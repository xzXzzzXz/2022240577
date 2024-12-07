<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
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

    $check = '1234';


    ?>
    <br>
    <?php
    if ($check == $_SESSION['email']){
    ?>
    <div class="container">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>img</th>
                <th>Type</th>

            </tr>
            <?php
            $counter = 1;
            foreach ($products as $row) {
                ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['img']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                </tr>
                <?php
                $counter++;
            } ?>
            <form method="post" action="add_product.php">
                <table>
                    <tr>
                        <th>Name:</th>
                        <td><input type="text" class="form-control" name="name" placeholder="Enter name" required="true"></td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td><input type="text" class="form-control" name="price" placeholder="Enter price" required="true"></td>
                    </tr>
                    <tr>
                        <th>Image URL:</th>
                        <td><input type="text" class="form-control" name="img" placeholder="Enter image URL" required="true"></td>
                    </tr>
                    <tr>
                        <th>Type:</th>
                        <td><input type="text" class="form-control" name="type" placeholder="Enter type" required="true"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="btn btn-primary" value="Add Product"></td>
                    </tr>
                </table>
            </form>

            <?php
            } else {
                ?>
                <div id="bannerImage">
                    <div class="container">
                        <center>
                            <div id="bannerContent">
                                <h1>No acsess</h1>
                                <a href="index.php" class="btn btn-danger">Back to Home</a>
                            </div>
                        </center>
                    </div>
                </div>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>

    <br><br><br><br><br>
    <?php require 'footer.php'; ?>
</div>
</body>
</html>

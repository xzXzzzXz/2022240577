<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/wotlogo.jpg" />
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


            $uses = $_SESSION['email'];
            $sql = "SELECT * FROM users WHERE email = :uses";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['uses' => $uses]);
            $users = $stmt->fetch(PDO::FETCH_ASSOC);




            ?>
            <br>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Citi</th>
                        <th>Address</th>

                    </tr>
                    <tr>

                        <td><?php echo $users['name'];?></td>
                        <td><?php echo $users['email'];?></td>
                        <td><?php echo $users['contact'];?></td>
                        <td><?php echo $users['city'];?></td>
                        <td><?php echo $users['address'];?></td>


                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1>Change Password</h1>
                        <form method="post" action="setting_script.php">
                            <div class="form-group">
                                <input type="password" class="form-control" name="oldPassword" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="newPassword" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="retype" placeholder="Re-type new password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
            <?php require 'footer.php'; ?>
        </div>
    </body>
</html>

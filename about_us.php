<?php
require 'connection.php';
session_start();
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
<?php
require 'header.php';
?>

<style>
    .containere {
        width: auto;
        text-align: center;
        align-items: center;
        margin-left: 100px;
        margin-right: 100px;

    }
    .team {
        display: flex;
        flex-flow: column;
        flex-wrap: wrap;
        justify-content: space-between;
        box-sizing: border-box;
        color: #0f0f0f;
        align-items: center;

    }
    .team-member {
        width: 70%;
        margin-bottom: 20px;
        display: flex;

        border: 1px solid black;

    }


    .team-member img {
        width: 300px;
        margin: 20px;
        border: 1px solid black;
        border-radius: 7px;

    }
    .texic{
        background-color: rgba(51, 38, 28, 0.38);
        border: 1px solid black;
        border-radius: 7px;
    }

</style>
<div class="containere">
    <section>
        <h2>Our Mission</h2>
        <p class="texic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium aliquet malesuada. Nam bibendum auctor erat ut efficitur. In vitae dui pretium, fermentum urna vel, cursus ex. Suspendisse sed tempor ipsum. Praesent ac scelerisque leo, imperdiet imperdiet sapien. Integer fringilla sed urna id sollicitudin. Duis quis nulla efficitur mauris porta imperdiet. Donec enim dolor, maximus et ex ut, feugiat porttitor enim. Integer sed est tempus, ornare lorem ut, aliquet velit. Nunc nec lacus id sem auctor egestas nec fringilla urna. Quisque sit amet lobortis dui. </p>
    </section>
    <section class="team">
        <h2>Our Team</h2>
        <div class="team-member">
            <img src="img/programer1.jpg" alt="Team Member 1">
            <div class="member-details">
                <h3>John Doe</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam maximus ligula vel aliquam tristique. Sed commodo rutrum ligula sit amet pharetra. Suspendisse tincidunt interdum lorem eu tempor. Vestibulum at auctor mi. Maecenas rhoncus libero mollis convallis tincidunt. Curabitur rutrum gravida massa. Vestibulum vel consectetur enim. Nullam at arcu gravida, tempor justo sit amet, ornare lectus. Mauris interdum fringilla risus vel mattis. Aenean et enim in mi finibus porttitor. Sed congue mollis nibh ut hendrerit. Proin sapien est, tincidunt sit amet diam sed, pellentesque laoreet arcu. Fusce ultricies arcu sit amet arcu egestas gravida. Praesent pretium fermentum ipsum, vel tincidunt mi hendrerit ut. </p>
            </div>
        </div>
        <div class="team-member">
            <div class="member-details">
                <h3>Mia Markus</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam maximus ligula vel aliquam tristique. Sed commodo rutrum ligula sit amet pharetra. Suspendisse tincidunt interdum lorem eu tempor. Vestibulum at auctor mi. Maecenas rhoncus libero mollis convallis tincidunt. Curabitur rutrum gravida massa. Vestibulum vel consectetur enim. Nullam at arcu gravida, tempor justo sit amet, ornare lectus. Mauris interdum fringilla risus vel mattis. Aenean et enim in mi finibus porttitor. Sed congue mollis nibh ut hendrerit. Proin sapien est, tincidunt sit amet diam sed, pellentesque laoreet arcu. Fusce ultricies arcu sit amet arcu egestas gravida. Praesent pretium fermentum ipsum, vel tincidunt mi hendrerit ut. </p>
            </div>
            <img src="img/programer4.jpg" alt="Team Member 1">
        </div>
        <div class="team-member">
            <img src="img/programer2.jpg" alt="Team Member 2">
            <div class="member-details">
                <h3>Jane Smith</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam maximus ligula vel aliquam tristique. Sed commodo rutrum ligula sit amet pharetra. Suspendisse tincidunt interdum lorem eu tempor. Vestibulum at auctor mi. Maecenas rhoncus libero mollis convallis tincidunt. Curabitur rutrum gravida massa. Vestibulum vel consectetur enim. Nullam at arcu gravida, tempor justo sit amet, ornare lectus. Mauris interdum fringilla risus vel mattis. Aenean et enim in mi finibus porttitor. Sed congue mollis nibh ut hendrerit. Proin sapien est, tincidunt sit amet diam sed, pellentesque laoreet arcu. Fusce ultricies arcu sit amet arcu egestas gravida. Praesent pretium fermentum ipsum, vel tincidunt mi hendrerit ut. </p>
            </div>
        </div>
        <div class="team-member">
            <div class="member-details">
                <h3>David Brown</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam maximus ligula vel aliquam tristique. Sed commodo rutrum ligula sit amet pharetra. Suspendisse tincidunt interdum lorem eu tempor. Vestibulum at auctor mi. Maecenas rhoncus libero mollis convallis tincidunt. Curabitur rutrum gravida massa. Vestibulum vel consectetur enim. Nullam at arcu gravida, tempor justo sit amet, ornare lectus. Mauris interdum fringilla risus vel mattis. Aenean et enim in mi finibus porttitor. Sed congue mollis nibh ut hendrerit. Proin sapien est, tincidunt sit amet diam sed, pellentesque laoreet arcu. Fusce ultricies arcu sit amet arcu egestas gravida. Praesent pretium fermentum ipsum, vel tincidunt mi hendrerit ut. </p>
            </div>
            <img src="img/programer3.jpg" alt="Team Member 3">
        </div>
    </section>
    <section>
        <h2>Our History</h2>
        <p class="texic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium aliquet malesuada. Nam bibendum auctor erat ut efficitur. In vitae dui pretium, fermentum urna vel, cursus ex. Suspendisse sed tempor ipsum. Praesent ac scelerisque leo, imperdiet imperdiet sapien. Integer fringilla sed urna id sollicitudin. Duis quis nulla efficitur mauris porta imperdiet. Donec enim dolor, maximus et ex ut, feugiat porttitor enim. Integer sed est tempus, ornare lorem ut, aliquet velit. Nunc nec lacus id sem auctor egestas nec fringilla urna. Quisque sit amet lobortis dui. </p>
    </section>
</div>
    <br><br><br>

    <br><br><br><br><br>
    <?php require 'footer.php'?>
</div>
</body>
</html>

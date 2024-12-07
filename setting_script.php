<?php
session_start();
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['retype'])) {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $retypePassword = $_POST['retype'];

        if ($newPassword != $retypePassword) {
            echo "New password and re-typed password do not match.";
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $user = $stmt->fetch();

        if ($user) {
            if ($oldPassword == $user['password']) {
                $Password = $newPassword;

                $update_stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :user_id");
                $update_stmt->execute(['password' => $Password, 'user_id' => $user_id]);

                echo '<script>alert("Password changed")</script>';
            } else {
                echo "Incorrect current password.";
            }
        } else {
            echo "User no found.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    exit;
}

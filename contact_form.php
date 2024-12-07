<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "aleksandar.tk2@gmail.com";
    $subject = "Poruka s kontakt forme";
    $headers= array(
        "MIME-Version"=>"1.0",
        "Content-Type"=>"text/html;charset=UTF-8",
        "From"=>"aleksandar.tk2@gmail.com",
        "Replay-To"=>"aleksandar.tk2@gmail.com",
    );

    $body = "Ime: $name\n\nE-mail: $email\n\nPoruka:\n$message";

    $mail = mail($to, $subject, $message, $headers);

    echo ($mail ? "radi" : "ne radi");

}

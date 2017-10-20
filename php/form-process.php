<?php
require 'bd.php';

    $avtor = $_POST["A"];
    $ocenka = $_POST["B"];
    $email = $_POST["D"];
    $text = $_POST["text"];
$cafe_id = $_POST["cafe_id"];
$query2 = "INSERT INTO mail
VALUES( '$text','$avtor','$email','$ocenka','$cafe_id')";

   echo "Спасибо за ваше мнение";


?>
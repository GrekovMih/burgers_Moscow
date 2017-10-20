<?php
header('Content-Type: application/json; charset=utf8');

require_once 'bd.php';

$cafe_id = $text = $email = $ocenka = $avtor = '';


$avtor = $_POST["avtor"];
$ocenka = $_POST["ocenka"];
$email = $_POST["email"];
$text = $_POST["text"];
$cafe_id = $_POST["cafe_id"];


$newComment = array("avtor" => $avtor, "email" => $email , "ocenka" => $ocenka, "text" => $text);
echo json_encode($newComment);

//$var = 'Hello, World!';
file_put_contents('comments.json', json_encode($newComment));


$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

mysqli_set_charset($link, "utf8");
$query2 = "INSERT INTO comments
            VALUES('', '$text', '$avtor', '$email', '$ocenka', '$cafe_id')";

$result2 = MYSQLI_QUERY($link, $query2);




?>
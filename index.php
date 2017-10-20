<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Бургерные Москвы</title>
<meta name="Description" content="Рейтинг бургерных Москвы"/>

<link rel="stylesheet" href="index.min.css"/><link rel="shortcut icon" href="/favicon.ico"/>

</head>
<body class="page">
<div class="page__inner">
<div class="head box i-bem" data-bem='{"box":{}}'><div class="layout"><div class="layout__left">
<form action="http://yandex.ru/yandsearch"></form></div><div class="layout__right">
<div class="logo">
<div><div></div><div class="logo__slogan">Бургерные Москвы</div>
</div></div></div></div>
<div class="box__switcher"></div>
</div>

<ul class="goods">

<?php
require_once 'bd.php';
require_once 'stat.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

mysqli_set_charset($link, "utf8");
 
$sql_select = "SELECT cafe.id, name, a, cafe.text,   AVG(ocenka) FROM cafe LEFT JOIN  comments
on cafe.id=cafe_id

GROUP BY cafe_id
ORDER BY AVG(ocenka)  DESC
 ";
$result = mysqli_query($link,$sql_select) or die("Ошибка " . mysqli_error($link));
$row = mysqli_fetch_array($result);

do
{
   $id=$row['id'];
   $name=$row['name'];
    $text=$row['AVG(ocenka)'];
     $text=round($text, 2); ;
   $a=$row['a'];


   echo "
 <li class='goods__item box'> 
 <h3>    $name  </h3>
    <div class='goods__image'></div>
<span class='goods__price'><a href=/id$id class='link link__control goods__link i-bem data-bem'='{link:{}}' role='link' tabindex='0'>
   $text
    </a></span>


<div class=goods__adress>$a</div></li> 
          ";


}
while($row = mysqli_fetch_array($result));
mysqli_close($link);
         ?>

</ul>

<div class="navbar navbar-fixed-bottom">
<div class="logo">
<div><div></div><div class="logo__slogan">По всем вопросам пишите burgersmoscow@gmail.com</div>
</div></div></div></div>


 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body></html>
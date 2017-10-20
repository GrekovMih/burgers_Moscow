<?php
require 'bd.php';

    $avtor = "Автор";
    $ocenka = 5;
    $email = '';
    $text = "Супергуд";
$cafe_id = $_POST["cafe_id"];


      echo "  <HR WIDTH=80% SIZE=3>
      <h5>  $avtor        </h5>
       <h5>   $text      </h5>
             <h5>  $email        </h5>
                   <h5>  $ocenka      </h5>
          
          ";
for($cafe_id = 2;$cafe_id++;$cafe_id<14)
{
$query2 = "INSERT INTO comments
VALUES('', '$text','$avtor','$email','$ocenka','$cafe_id')";

$result2 = MYSQL_QUERY($query2);
}

// Ïðîâåðÿåì, åñòü ëè îøèáêè
 



?>
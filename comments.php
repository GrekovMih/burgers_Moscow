<!DOCTYPE html>
<html class="ua_js_no">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Бургерные Москвы</title>

    <meta name="description" content=""/>
    <link rel="stylesheet" href="index.min.css"/>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="page">
<div class="page__inner">
    <div class="head box i-bem" data-bem='{"box":{}}'>
        <div class="layout">
            <div class="layout__left">
                <form action="http://yandex.ru/yandsearch"></form>
            </div>
            <div class="layout__right">
                <div class="logo">
                    <div>
                        <div></div>
                        <div class="logo__slogan"><a href=index.php> Бургерные Москвы </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box__switcher"></div>
    </div>
    <style>

        a {
            color: black;
            text-decoration: none;
        }

        A:hover {
            color: black;
            text-decoration: none;
    </style>

    <?php


    $id = $_SERVER['REQUEST_URI'];
    $id = substr($id, 3);

    require_once 'bd.php';

    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

    mysqli_set_charset($link, "utf8");


    $sql_select = "SELECT cafe.id, name, a, cafe.text,   AVG(ocenka)  FROM   cafe LEFT JOIN  comments
on cafe.id = cafe_id
WHERE cafe.id = $id
GROUP BY cafe_id ";
    $result = mysqli_query($link, $sql_select) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_array($result);

    do {
        $id = $row['id'];
        $name = $row['name'];
        $text = $row['AVG(ocenka)'];
        $text = round($text, 2);
        $a = $row['a'];


        echo "
   <ul class='goods' width= 90%;><li class='goods__item2 box'><h3 class='goods__title'>  $name  
 
<span class='goods__price'><a href=/id$id class='link link__control goods__link i-bem data-bem'='{link:{}}' role='link' tabindex='0'>
   $text
    </a></span>


<div class=goods__adress>$a</div></li> 
          ";


    } while ($row = mysqli_fetch_array($result));


    $row = mysqli_fetch_array($result);
    $sql_select = "SELECT  *  FROM comments WHERE cafe_id=$id";
    $result = mysqli_query($link, $sql_select) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_array($result);

    do {

        $avtor = $row['avtor'];
        $text = $row['text'];


        $email = $row['email'];
        $ocenka = $row['ocenka'];


        echo "  <HR WIDTH=80% SIZE=3>
        <h5>  $avtor        </h5>
        <h5>   $text      </h5>
        <h5>  $email        </h5>
        <h5>  $ocenka      </h5>
          
          ";


    } while ($row = mysqli_fetch_array($result));

    ?>


    <div id="comments"></div>

    <div id="msgSubmit" class="h3 text-center hidden"></div>




    <div class="row">

        <div class="well" style="margin-top: 5%;">

            <div id="newComments">

            <h3>Ваше мнение</h3>

            <form role="form" id="contactForm" data-toggle="validator" class="shake">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="avtor" class="h4">Ваше имя</label>
                        <input type="text" class="form-control" id="avtor" placeholder="Гомер">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="email" class="h4">Почта</label>
                        <input type="email" class="form-control" id="email" placeholder="">

                    </div>


                    <div class="form-group col-sm-6">
                        <label for="ocenka" class="h4">Оценка</label>
                        <select class="form-control" data-live-search="true" name="ocenka" id="ocenka">
                            <option value="1"> Ужасно (1 счастливый Гомер из 5)</option>
                            <option value="2"> Плохо (2 счастливых Гомера из 5)</option>
                            <option value="3"> Сойдет (3 счастливых Гомера из 5)</option>
                            <option value="4"> Годно (4 счастливых Гомера из 5)</option>
                            <option selected value="5"> Очень вкусно (5 счастливых Гомера из 5)</option>
                        </select>
                    </div>

                    <p><textarea rows="10" cols="2500000" id="text" class="form-control" name="text" size="150"
                                 style="width: 70%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;"></textarea>
                    </p>


                </div>


                <input type="button" id="form-submit" class="btn btn-success btn-lg pull-right" value="Выcказаться">

                <div class="clearfix"></div>
            </form>


        </div>
    </div>

        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

        <script type="text/javascript">


            $("#form-submit").bind("click", function (event) {

                var avtor = $("#avtor").val();
                var ocenka = $("#ocenka").val();
                var email = $("#email").val();
                var text = $("#text").val();
                var cafe_id = <?=$id?>;

                $.ajax({
                    url: 'form-process.php',
                    type: 'post',
                    data: "avtor=" + avtor + "&ocenka=" + ocenka + "&email=" + email
                    + "&cafe_id=" + cafe_id + '&text=' + text,
                    cache: false,
                    success: function () {
                        console.log('запрос пошел');
                    }


                });


                $.getJSON('comments.json', function (data) {
                    thankYou = "Спасибо за ваше мнение!";
                    $("#newComments").html(thankYou);
                    comments = "";
                    $.each(data, function (key, val) {
                        comments ='<b>' + comments + val + '<br/>'
                    });
                    $("#comments").html(comments);
                    console.log('запрос вернулся');
                });

                 */


            });

        </script>
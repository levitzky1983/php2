<?
    include "../controllers/main.php";
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</head>
    <title>Sink</title>
</head>
<body>
    <? include "../templates/header.php";?>
    <main>
    <?php
        if($good){?>
            <div class="item_sink">
                <img src="img/<?=PATH_BIG_IMG.$good['img']?>" width='800' alt="<?=$good[title]?>" title="<?=$good[title]?>">
                <h3 class="item-name"><?=$good[title]?></h3>
                <p class="price"><?=$good[price]?>р.</p>
                <p class="info"><?=$good[info]?></p>
                <p class="color"><?=$good[color]?></p>
                <p class="add-to-basket"><button class='button' onclick='addToCart(<?=$good[id]?>)' title="Добавить в корзину">Добавить в корзину</button></p>
                <p><a href="index.php">Вернуться</a></p>
            </div>
        <?}
    ?>
    </main>
    <? include "../templates/footer.php";?>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
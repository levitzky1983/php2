<?php include_once "../controllers/main.php"; ?>   
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
    <title>Kitchen sinks</title>
<body>
    <? include "../templates/header.php";
       include "../templates/nav.php";
       include "../templates/slider.php"; 
    ?>
    <?php include_once "../controllers/main.php"; ?>
    <main>
        <section class="items flex_col">
            <h2 class='headerName'><?=$headerName?></h2> 
            <?php 
                if(isset($goods)){
                    foreach ($goods as $good){?>
                        <div class="item flex_row">
                            <h3 class="item-name  flex_row">
                                <a href="item.php?id=<?=$good[id]?>"><?=$good[title]?></a>
                                
                            </h3>
                            <div class="image">
                                <a href="item.php?id=<?=$good[id]?>"><img src="img/<?=PATH_SMALL_IMG.$good['img']?>" alt="<?=$good[title]?>" title="<?=$good[title]?>"></a>
                            </div>  
                           <div class="characteristic"><?=$good[info]?></div>  
                            <div class="add-to-basket flex_col">
                                <p class="price font_norm">Цена : <?=$good[price]?> р.</p>
                               <!-- <p><button class='button' onclick='addToCart(<?//=$good[id]?>)' title="Добавить в корзину">Добавить в корзину</button></p>
                                <p><a href="../public/cart.php"><button class='button' onclick='addToCart(<?//=$good[id]?>)' title="Добавить в корзину">Оформить заказ</button></a></p>-->
                                <p><a  href="item.php?id=<?=$good[id]?>"><button class="button "> Просмотреть</button></a></p>
                            </div>  
                            
                        </div>
                    <?}
                }
            ?>
            <button class='button' onclick="showMore(<?=$beginShow?>,<?=$countShow?>,'<?=$headerName?>')">Показать еще</button>
        </section>
    </main>
    <? include "../templates/footer.php";?>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
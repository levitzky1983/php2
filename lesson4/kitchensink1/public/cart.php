<?include "../controllers/cart.php";?>    
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
    <title>Корзина</title>
</head>
<body>
    <? include "../templates/header.php";?>
    <main class="cart">
        <h2 class="font_norm flex_row">Корзина</h2>
        <?if(!empty($goods)){?>
        <div class="user_cart flex_col" id='user_cart'>
            <?foreach($goods as $good){?>
                <div class="item-cart flex_row font_norm">
                    <div class="item-cart-img">
                        <img src='../public/img/uploads/prev/<?=$good['good_img'];?>' alt="Фото товара" width='150'>
                    </div> 
                    <div class="item-cart-title">
                        <p class="font_comment">Название</p>
                        <p> <?=$good['good_title'];?></p>
                    </div>
                    <div class="item-cart-title">
                    <p class="font_comment">Цвет</p>
                        <?=$good['good_color'];?>
                    </div>
                    <div class="item-cart-count flex_col">
                        <p class="font_comment">Количество</p>
                        <div class="item-cart-count-display flex_row">
                            <button class="btn-count" onclick="count_change('minus','<?=$good['id_good']?>')">&#45;</button>
                            <input type="text" id ="count-display-<?=$good['id_good']?>" class="count-display" value="<?=$good['good_count'];?>" disabled>
                            <button class="btn-count"  onclick="count_change('plus','<?=$good['id_good']?>')">&#43;</button>
                        </div> 
                    </div>
                    <div class="item-cart-title">
                        <p class="font_comment">Стоимость</p>
                        <p id="price-display-<?=$good['id_good']?>"><?=$good['good_price'];?></p>
                    </div>
                    <div class="item-cart-delete">
                        <a href='../public/cart.php?indexToDelete=<?=$good['id_good'];?>' class='link'>Удалить</a>
                    </div>
                    <?$order_price+=$good['good_price'];?>
                </div>
                    
            <?}?>
            <p id="user-cart-price" class="user-cart-price flex_row font_norm">Общая цена заказа : <?=$order_price?> р.</p> 
            <p class='font_norm flex_row continue_buy' ><a href='index.php'>Продолжить покупки</a></p>
            <form id='form_buy' class="cart_form font_norm" action="#" method="POST">
            <p>Введите Ваше имя<span>*<span> :</p>
            <input id='form_buy_name' type="text" name="name" requred>
            <p>Введите Вашу почту</p>
            <input id='form_buy_email' type="email" name="email" >
            <p>Введите Ваш адрес<span>*<span> :</p>
            <input id='form_buy_adres' type="text" name="adres" requred>
            <p>Введите телефон для связи<span>*<span> :</p>
            <input id='form_buy_phone' type="tel" name="addres" phone requred>
            <p>Выберите способ доставки</p>
            <p><input class='delivery' type="radio" name="delivery" value='Самовывоз' checked>Самовывоз(Бесплатно)</p>
            <p><input class='delivery' type="radio" name="delivery" value='Доставка курьером'>Доставка курьером(По г.Рязань оплата 500р.)</p>
            <input type='button' id='buy_good' class="button" name='submit' onclick='buy()' value='Оформить заказ'>
            <input type="reset" class="button" value="Сбросить">
        </form>   
        </div>
        
    <?} else {
         echo "<p>Корзина пуста.</p>";
         echo "<p class='font_norm'><a class='link' href='index.php'>Вернуться</a></p>";
    }?>
    
    </main>
    <? include "../templates/footer.php";?>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
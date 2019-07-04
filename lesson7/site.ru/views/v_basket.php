<div class="cart">
    <h2 class="font_norm flex_row">Корзина</h2>
        <?if(!empty($goods)):?>
        <div class="user_cart flex_col" id='user_cart'>
            <?foreach($goods as $good):?>
                <div style='border:1px solid black' class="item-cart flex_row font_norm">
                    <!--<div class="item-cart-img">
                        <img src='../public/img/uploads/prev/<?//=$good['good_img'];?>' alt="Фото товара" width='150'>
                    </div> -->
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
                        <a href='index.php?path=basket/deleteGoodFromBasket/<?=$good['id_good'];?>' class='link'>Удалить</a>
                    </div>
                    <?$order_price+=$good['good_price'];?>
                </div>
                    
            <?endforeach?>
            <p id="user-cart-price" class="user-cart-price flex_row font_norm">Общая цена заказа : <?=$order_price?> р.</p> 
            <p class='font_norm flex_row continue_buy' ><a href='index.php?path=catalog'>Продолжить покупки</a></p>
            <p><a href="index.php?path=basket/deleteAllBasket">Очистить корзину</a></p>
            <?php if(Session::get('user_id')):?>
                <form id='form_buy' class="cart_form font_norm" action="#" method="POST">
                    <input type="hidden" name='user_id' value=<?=Session::get('user_id')?>>
                    <input type='button' id='buy_good' class="button" name='submit' onclick='buy()' value='Оформить заказ'>
                </form>
            <?else:?>
                <form id='form_buy' class="cart_form font_norm" action="#" method="POST">
                    <p>Введите Ваше имя<span>*<span> :</p>
                    <input id='form_buy_name' type="text" name="name" requred>
                    <p>Введите телефон для связи<span>*<span> :</p>
                    <input id='form_buy_phone' type="tel" name="addres" phone requred>
                    <input type='button' id='buy_good' class="button" name='submit' onclick='buy()' value='Оформить заказ'>
                    <input type="reset" class="button" value="Сбросить">
                </form>
            <?endif?>

        </div>
        
        <?else:?> 
            <p>Корзина пуста.</p>
            <p class='font_norm'><a class='link' href='index.php'>Вернуться</a></p>
        <?endif?>
    
</div>
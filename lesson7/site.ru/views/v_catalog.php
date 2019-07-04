<div>
    <? for($i=0; $i<count($goods); $i++):?>
    <div style='border:1px solid black' class='good' id='good_<?=$goods[$i]['id'];?>'>
        <p><a href="index.php?path=good/<?=$goods[$i]['id'];?>"> Название : <?=$goods[$i]['title'];?></a></p>
        <p>Категория : <?=$goods[$i]['category'];?></p>
        <p>Цвет : <?=$goods[$i]['color'];?></p>
        <p>Цена : <?=$goods[$i]['price'];?></p>
        <a class='button' href="index.php?path=basket/addToBasket/<?=$goods[$i]['id'];?>">Купить</a>
        <!--<button class='button' onclick="addToBasket(<?//=$goods[$i]['id'];?>)">Купить</button>-->
    </div>
    <? endfor ?>
</div>
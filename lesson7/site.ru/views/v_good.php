<div class='item'>
<div class='good' id='good_<?=$good['id'];?>'>
        <p> Название : <?=$good['title'];?></p>
        <p>Категория : <?=$good['category'];?></p>
        <p>Цвет : <?=$good['color'];?></p>
        <p>Цена : <?=$good['price'];?></p>
        <p>Описание : <?=$good['info']?></p>
        <a class='button' href="index.php?path=basket/addToBasket/<?=$good['id'];?>">Купить</a>
        <!--<button class='button' onclick="addToBasket(<?//=$good['id'];?>)">Купить</button>-->
</div>
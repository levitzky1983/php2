<?php
    include "../controllers/admin.php";
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/script.js"></script> 
   
</head>
    <title>Админка</title>
</head>
<body>
    <? include "../templates/header.php";?>
    <main>
    
    <?php
        if($_SESSION['auth']){?>
            <form action="#" method='POST'>
                <input type="submit" name='exit' value='Выйти'>
            </form>
            <ul>
                <li><a class="link link_admin" href="add.php">Добавить товар</a></li>
                <li><a class="link link_admin" href="orders.php">Просмотреть заказы</a></li>
            </ul>
            <?if (isset($goods)){
                foreach ($goods as $good){?>
                    <div class="item">
                    <a href="item.php?id=<?=$good[id]?>"><img src="<?='../public/img/'.PATH_SMALL_IMG.$good['img']?>" alt="<?=$good[title]?>" title="<?=$good[title]?>"></a>
                    <h3 class="item-name"><a href="item.php?id=<?=$good[id]?>"><?=$good[title]?></a></h3>
                    <p class="price"><?=$good[price]?>р.</p>
                    <ul>
                        <li><a class="link link_admin" href="edit.php?id=<?=$good['id']?>">Редактировать</a></li>
                        <li><a class="link link_admin" href="delete.php" onclick="deleteGood(<?=$good['id']?>)">Удалить</a></li>
                    </ul>
                </div>
                <?}
            }
        } else {?>
            <form action="#" method='POST'>
                <input type="text" name='login'>
                <input type="password" name='pass'>
                <input type="submit" name='auth' value='Воитй'>
            </form>
            <a href="../public/index.php">Вернуться</a><?
        }
    ?>
    </main>
    <? include "../templates/footer.php";?>   
   
</body>
</html>
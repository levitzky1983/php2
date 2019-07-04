<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="js/jquery.js"></script>
    <script src="public/js/script.js"></script>
</head>
<body>
    <div class="fix">
        <header id='header' class="flex">
            <i>Иконка</i>
            <ul class="menu flex">
                <li class="menu_li"><a href="index.php" class="link"> Главная</a></li>
                <?php if(Session::get('auth')):?>
                    <p>Привет, <? echo Session::get('name');?></p>
                    <li class="menu_li"><a href="index.php?c=personalAccount&action=index" class="link">Личный кабинет</a></li>
                    <li class="menu_li"><a href="index.php?c=user&action=logOut" class="link">Выйти</a></li> 
                <?php else:?>
                    <li class="menu_li">
                        <form action="index.php" method = 'POST'>
                            <input type="hidden" name = 'auth'>
                            <p>Логин</p><input type="text" name='login'>
                            <p>Пароль</p><input type="text" name="pass">
                            <input type="submit" value='Войти'>
                        </form>
                    <li class="menu_li"><a href="index.php?c=registration&action=index" class="link">Регистрация</a></li> 
                <?php endif?>
            </ul>
        </header>
        <?php include "views/$v_content";?>
        <footer>footer</footer>
    </div>
   
</body>
</html>
<?
    include_once "../controllers/admin.php";
    if (!$_SESSION['auth']){
        header("Location:admin.php");
    }
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
        <title>Добавить товар</title>
    </head>
    <body>
        <? include "../templates/header.php";?>
        <main>
            <form action="#" method='POST' enctype='multipart/form-data'>
                <p>Артикул</p>
                <input type="text" name='article'>
                <p>Название</p>
                <input type="text" name='title'>
                <p>Тип</p>
                <input type="text" name='type'>
                <p>Форма</p>
                <input type="text" name='form'>
                <p>Производитель</p>
                <input type="text" name='manufacturer'>
                <p>Цвет</p>
                <input type="text" name='color'>
                <p>Краткое описание</p>
                <textarea name='description'></textarea>
                <p>Полное описание</p>
                <textarea name='info'></textarea>
                <p>Добавьте фотографию</p>
                <input type='file' name='img' accept='image/*'>
                <p>Цена</p>
                <input type="number" name='price'>
                <p>Хит</p>
                <input type="number" name='hit'>
                <p><input type="submit" name='add' value='Добавить'></p>
                
            </form>
            <p><a href="admin.php">Вернуться</a></p>
            <p><?=$message;?></p>
        </main>
        <? include "../templates/footer.php";?>    
    </body>
    </html>
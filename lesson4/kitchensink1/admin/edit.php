<?php
session_start();
    include_once "../model/model.php";
    if($_SESSION['auth']){
        $id = (int)($_GET['id']);
        $res = getOne($connect,$sinks_table,$id);
    } else {
        header("Location:admin.php");
    }
    mysqli_close($connect);
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
    <title>Редактирование</title>
</head>
<body>
    <? include "../templates/header.php";?>
    <main>
        
        <form method = 'POST' action="" id='edit_form' enctype='multipart/form-data'>
            <p> Артикул : </p>
            <input type='text' id='edit_article' name='article' value='<?=$res['article']?>'>
            <p> Название : </p>
            <input type='text' id='edit_title' name='title' value='<?=$res['title']?>'>
            <p> Тип : </p>
            <input type='text' id='edit_type' name='type' value='<?=$res['type']?>'>
            <p> Форма : </p>
            <input type='text' id='edit_form' name='form' value='<?=$res['form']?>'>
            <p> Производитель : </p>
            <input type='text' id='edit_manufacturer' name='manufacturer' value='<?=$res['manufacturer']?>'>
            <p> Цвет : </p>
            <input type='text' id='edit_color' name='color' value='<?=$res['color']?>'>
            <p> Краткое описание : </p>
            <textarea id='edit_description' name='description'><?=$res['description']?></textarea>
            <p> Полное описание : </p>
            <textarea id='edit_info' name='info'><?=$res['info']?></textarea>
            <p> Картинка : </p>
            <input type='file'  accept='image/*' name='img'>
            <input type="text" id='edit_img' name='prev_img' value='<?=$res['img']?>'>
            <p> Цена : </p>
            <input type='number' id='edit_price' name='price' value='<?=$res['price']?>'>
            <p> Хит : </p>
            <input type='text' id='edit_hit' name='hit' value='<?=$res['hit']?>'>
            <input type='button' id='edit_good' name='edit' onclick='editGood()' value='Сохранить'>
            <input type="hidden" name='id' value='<?=$res['id']?>'>
        </form>
        <p><a href='admin.php'>Вернуться</a></p>
        <p id='answer'></p>

    </main>
    <? include "../templates/footer.php";?>    
</body>
</html>
   
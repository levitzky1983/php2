
<h1>Личный кабинет господина(жи) <?=$name?></h1>
<p>Имя : <?=$name?></p>
<p>Логин : <?=$login?></p>
<p>Посещенные страницы : </p>
<?foreach(Session::lastPages() as $page):?>
<p><?echo $page?></p>
<?endforeach?>

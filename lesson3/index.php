<?php
include_once 'model/model.php';
$fotoArr = array_slice(scandir('img/preview/'),2);
// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблоны
  $TemplateHeader = $twig->loadTemplate('header.tmpl');
  $TemplateMain = $twig->loadTemplate('v_main.tmpl');
  $TemplateFooter = $twig->loadTemplate('footer.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  $pageHeader = $TemplateHeader->render(array( 'title' => 'Фотогалерея',));
  $pageFooter = $TemplateFooter->render(array());
  $pageMain = $TemplateMain->render(array(
    'images' => $fotoArr,
    'pathPreview'=> 'img/preview/',
    'pathImg' => 'img/',
  ));
  echo $pageHeader.$pageMain.$pageFooter;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>

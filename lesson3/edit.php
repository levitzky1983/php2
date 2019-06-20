<?php
include_once 'model/model.php';
if (isset($_POST['submit'])) {
    $message = addImages('images','img/','img/preview/');
}

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
  $TemplateEdit = $twig->loadTemplate('edit.tmpl');
  $TemplateFooter = $twig->loadTemplate('footer.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  $pageHeader = $TemplateHeader->render(array( 'title' => 'Добавление фото',));
  $pageFooter = $TemplateFooter->render(array());
  $pageEdit = $TemplateEdit->render(array(
    'message' => $message,
  ));
  echo $pageHeader.$pageEdit.$pageFooter;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>

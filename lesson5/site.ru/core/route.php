<?php
class Route {
    static function start() {
        if(isset($_GET['action'])) {
            $c_name = trim(strip_tags($_GET['c']));
            $act_name = trim(strip_tags($_GET['action']));
        } else {    
            $c_name = 'main';
            $act_name = 'index';
        }
        if(isset($_POST['auth'])){
            $c_name = 'user';
            $act_name  = 'auth';
        }
        if(isset($_POST['registration'])){
            $c_name = 'registration';
            $act_name  = 'submit';
        }
        $c_file = 'controllers/c_'.$c_name.'.php';
        $m_file = 'models/m_'.$c_name.'.php';
        $act_name = 'action_'.$act_name;
        if(file_exists($c_file)) {
            include $c_file;
        } else {
            header ('Location : index.php');
        }
        if(file_exists($m_file)) {
            include $m_file;
        }
        $c_name = 'c_'.$c_name;
        $controller = new $c_name;
        $action = $act_name;
        $controller->$action();
    }
}

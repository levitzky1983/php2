<?php
class Route {
    static function start() {
        DB::instance();
        //$pages=Session::lastPages();
        if(isset($_GET['path'])) {
            $url = explode("/",trim(strip_tags($_GET['path'])));
            $_GET['page'] = ($url[0])?$url[0]:'main';
            if (isset($url[1])) {
                if (is_numeric($url[1])) {
                    $_GET['id'] = $url[1];
                    $id = $url[1];
                } else {
                    $_GET['action'] = $url[1];
                }
                if (isset($url[2])) {
                    $_GET['id'] = $url[2];
                    $id = $url[2];
                }
            }
            $c_name = $_GET['page'];
            $act_name = ($_GET['action'])?$_GET['action']:'index';
        } else {    
            $c_name = 'main';
            $act_name = 'index';
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

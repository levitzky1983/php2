<?php
class C_Main extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_Main;
    }
    function action_index() {
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
    }
}
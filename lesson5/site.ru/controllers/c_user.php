<?php
class C_User extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_User;
    }
    function action_index() {
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
    }
    function action_auth() {
        $this->model->authUser();
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
    }
    function action_logOut() {
        $this->model->logOut();
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
    }
    

}
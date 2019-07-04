<?php
class C_User extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_User;
    }
    function action_index($id) {
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
    }
    function action_auth($id) {
        $data = $this->model->authUser($id);
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная','data'=>$data));
    }
    function action_logOut($id) {
        $this->model->logOut($id);
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
    }
    function action_registration($id){
        if($this->isPost($id)){
            $data = $this->model->registration();
        }
        //print_r($_POST);
        //$d=$this->isPost();
        //echo $d;
       
        $this->view->Template('v_registration.php','v_template.php',array('title'=>'Регистрация','str'=>$data));
    }

    function action_account($id) {
        $data = $this->model->account($id);
        $this->view->Template('v_personalAccount.php','v_template.php',array('title'=>'Личный кабинет','data'=>$data));
    }
    

}
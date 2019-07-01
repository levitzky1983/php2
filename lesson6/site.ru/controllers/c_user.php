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
        $data = $this->model->authUser();
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная','data'=>$data));
    }
    function action_logOut() {
        $this->model->logOut();
        $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
    }
    function action_registration(){
        if($this->isPost()){
            $data = $this->model->registration();
        }
        //print_r($_POST);
        //$d=$this->isPost();
        //echo $d;
       
        $this->view->Template('v_registration.php','v_template.php',array('title'=>'Регистрация','str'=>$data));
    }

    function action_account() {
        $data = $this->model->account();
        $data['title'] = '';
        $this->view->Template('v_personalAccount.php','v_template.php',array('title'=>'Личный кабинет','data'=>$data));
    }
    

}
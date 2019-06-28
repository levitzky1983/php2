<?php 
class C_Registration extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_Registration;
    }

    function action_index(){
        $this->view->Template('v_registration.php','v_template.php',array('title'=>'Регистрация'));
    }
    function action_submit() {
       $str = $this->model->getData();
       $this->view->Template('v_registration.php','v_template.php',array('title'=>'Регистрация','str'=>$str));
    }
}
<?php
class C_PersonalAccount extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_PersonalAccount;
    }
    function action_index(){
        $data = $this->model->getData();
        $data['title'] ='Кабинет'; 
        $this->view->Template('v_personalAccount.php','v_template.php',$data);
        
    }
}
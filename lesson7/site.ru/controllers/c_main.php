<?php
class C_Main extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_Main;
    }
    function action_index($id) {
        $new_user = new C_User;
        if($this->isPOST()) {
            if(isset($_POST['auth'])) {
                $new_user->action_auth($id);
            } elseif(isset($_POST['registration'])) {
                $new_user->action_registration($id);
            }
           
        } else {
            $this->view->Template('v_main.php','v_template.php',array('title'=>'Главная'));
        }
       
    }
}
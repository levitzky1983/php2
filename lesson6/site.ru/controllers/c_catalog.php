<?
class C_Catalog extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_Catalog;
    }
    function action_index() {
        $data = $this->model->getData();
        
        $this->view->Template('v_catalog.php','v_template.php',array('title'=>'Каталог','goods'=>$data));
    }
}
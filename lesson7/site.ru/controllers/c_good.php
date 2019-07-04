<?
class C_Good extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_Good;
    }
    public function action_index($id) {
        $data = $this->model->getData($id);
        $this->view->Template('v_good.php','v_template.php',array('title'=>'Товар','good'=>$data));
    }
}
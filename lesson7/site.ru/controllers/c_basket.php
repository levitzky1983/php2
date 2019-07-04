<?
class C_Basket extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_Basket;
    }
    public function action_index($id) {
        $data = $this->model->getData($id);
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина','goods'=>$data));
    }
    public function action_addToBasket($id) {
        $data = $this->model->addToBasket($id);
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина','goods'=>$data));
    }

    public function action_deleteAllBasket($id) {
        $this->model->deleteAllBasket();
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина'));
    }

    public function action_deleteGoodFromBasket($id) {
        $data = $this->model->deleteGoodFromBasket($id);
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина','goods'=>$data));
    }
}
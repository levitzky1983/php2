<?
class C_Basket extends Controllers {
    function __construct() {
        parent::__construct();
        $this->model = new M_Basket;
    }
    public function action_index() {
        $data = $this->model->getData();
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина','goods'=>$data));
    }
    public function action_addToBasket() {
        $data = $this->model->addToBasket();
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина','goods'=>$data));
    }

    public function action_deleteAllBasket() {
        $this->model->deleteAllBasket();
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина'));
    }

    public function action_deleteGoodFromBasket() {
        $data = $this->model->deleteGoodFromBasket();
        $this->view->Template('v_basket.php','v_template.php',array('title'=>'Корзина','goods'=>$data));
    }
}
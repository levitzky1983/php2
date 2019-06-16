<?
abstract class BaseProduct {
    private $title, $count;
    function setTitle($title) {
        $this->title = $title;
    }
    function getTitle() {
        return $this->title;
    }
    function setCount($count) {
        $this->count = $count;
    }
    function getCount() {
        return $this->count;
    }
    protected function constructChild($title,$count){
        $this->setTitle($title);
        $this->setCount($count);
    }
    abstract protected function getFinalPrice();
    function showIncome() {
        return $this->getFinalPrice()*$this->getCount();
    }
} 
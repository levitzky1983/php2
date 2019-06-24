<?
class WeightProduct extends BaseProduct {
    private $numberOfKg, $pricePerKg;
    function setPricePerKg($pricePerKg) {
        $this->pricePerKg = $pricePerKg;
    }
    function getPricePerKg() {
        return $this->pricePerKg;
    }
    function setNumberOfKg($numberOfKg) {
        $this->numberOfKg = $numberOfKg;
    }
    function getNumberOfKg() {
        return $this->numberOfKg;
    }
    function __construct($title,$count,$numberOfKg,$pricePerKg) {
        parent::constructChild($title,$count);
        $this->setNumberOfKg($numberOfKg);
        $this->setPricePerKg($pricePerKg);
    }
    function getFinalPrice() {
        return $this->getNumberOfKg()*$this->getPricePerKg();
    }
}
<?
class DigitalProduct extends BaseProduct {
    const PRICE = 1000;
    function __construct($title,$count) {
        parent::constructChild($title,$count);
    }
    function getFinalPrice() {
        return self::PRICE;
    }

}

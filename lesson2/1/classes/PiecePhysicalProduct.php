<?
class PiecePhysicalProduct extends DigitalProduct{
    private $price = DigitalProduct::PRICE*2;
    function getFinalPrice() {
        return $this->price;
    }
}
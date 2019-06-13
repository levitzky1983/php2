<?php
class KitchenSink {
	private $title, $material, $form, $manufacturer, $price;
	protected function setTitle($title) {
		$this->title = $title;
	}
	protected function setMaterial($material) {
		$this->material = $material;
	}
	protected function setForm($form) {
		$this->form = $form;
	}
	protected function setManufacturer($manufacturer) {
		$this->manufacturer = $manufacturer;
	}
	protected function setPrice($price) {
		$this->price = $price;
	}

	protected function getTitle() {
		return $this->title;
	}
	protected function getMaterial() {
		return $this->material;
	}
	protected function getForm() {
		return $this->form;
	}
	protected function getManufacturer() {
		return $this->manufacturer;
	}
	protected function getPrice() {
		return $this->price;
	}

	function __construct($title,$material,$form,$manufacturer,$price)
	{
		$this->setTitle($title);
		$this->setMaterial($material);
		$this->setForm($form);
		$this->setManufacturer($manufacturer);
		$this->setPrice($price);

	}
	function showItemSink(){
		echo "<div>
                <h3>".$this->getTitle()."</h3>
                <p> Материал : ".$this->getMaterial()."</p>
                <p> Форма : ".$this->getForm()."</p>
                <p> Производитель : ".$this->getManufacturer()."</p>
                <p> Цена : ".$this->getPrice()."</p>";
	}
}

class SteelSink extends KitchenSink
{
	private $thick;
	function __construct($title,$material,$form,$manufacturer,$price,$thick)
	{
		parent::__construct($title,$material,$form,$manufacturer,$price);
		$this->setThick($thick);
	}
	function setThick($thick) {
		$this->thick = $thick;
	}
	function getThick() {
		return $this->thick;
	}
	function showItemSink() {
		parent::showItemSink();
		echo " 
				<p> Толщина стали : ".$this->getThick()."</p>
				<p><button title='Добавить в корзину'>Добавить в корзину</button></p>
                <p><a href='#'>Вернуться</a></p>
            </div>";

	}
}

class StoneSink extends KitchenSink
{
	private $color;
	function __construct($title,$material,$form,$manufacturer,$price,$color)
	{
		parent::__construct($title,$material,$form,$manufacturer,$price);
		$this->setColor($color);
	}
	function setColor($color) {
		$this->color = $color;
	}
	function getColor() {
		return $this->color;
	}
	function showItemSink() {
		parent::showItemSink();
		echo " 
				<p> Цвет : ".$this->getColor()."</p>
				<p><button title='Добавить в корзину'>Добавить в корзину</button></p>
                <p><a href='#'>Вернуться</a></p>
            </div>";

	}
}

$stone = new StoneSink("Каменная мойка","Искусственный камень","Овальная","Производитель 1",5000,"Серый");

$steel = new SteelSink("Стальная мойка","Нержавеющая сталь","Квадратная","Производитель 2",2000,"3мм");

$stone->showItemSink();
$steel->showItemSink();




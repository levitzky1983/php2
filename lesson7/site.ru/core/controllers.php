<?php
abstract class Controllers {
    public $model;
    public $view;
    function __construct() {
        $this->view = new View;
    }
    function action_index($id){}

    protected function IsGet() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}
	protected function IsPost()	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
}
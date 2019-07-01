<?php
abstract class Controllers {
    public $model;
    public $view;
    function __construct() {
        $this->view = new View;
    }
    function action_index(){}

    protected function IsGet() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}
	protected function IsPost()	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
}
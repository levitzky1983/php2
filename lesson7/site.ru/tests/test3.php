<?php
use PHPUnit\Framework\TestCase;
spl_autoload_register(function ($className) {
    $dirs = ['../core','../controllers','../models'];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = $dir . '/'.$className.'.php';
        if (is_file($fileName)) {
            require_once($fileName);
            $found = true;
        }
    }
    
});

class DeleteBasket extends TestCase {
        public function testDeleteBasket() {
            $data = new M_Basket;
            $result = $data->deleteAllBasket($id);
            $this->AssertNull($result);
        }
    
}
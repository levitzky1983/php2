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


class  GoodDataTest extends TestCase {
    /**
    * @dataProvider arrProvider
    */
    public function testGoodGetData($id,$expected) {
        $result = M_Good::getData($id);
        $this->assertEquals($expected, $result);
    } 
    public function arrProvider() {
        return [
                    [1,[
                        'id'=>1,
                        'title'=>'мойка 1',
                        'price'=>10000,
                        'article'=>'1111',
                        'img'=>'1.jpeg',
                        'category'=>'Кухонные мойки',
                        'form'=>'квадратная',
                        'manufacturer'=>'производитель 1',
                        'color'=>'Белый',
                        'info'=>'описание 1',
                        'material'=>'искусственный камень'
                        ]
                    ]
        ];
    }
}
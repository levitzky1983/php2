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

class UserRegistrationTest extends TestCase {
    /**
    * @dataProvider arrProvider
    */
    public function testUserRegistration($name,$login,$pass,$expected) {
        $_POST['name'] = $name;
        $_POST['login']  = $login;
        $_POST['pass'] = $pass;
        $result = M_User::registration($id);
        $this->assertSame($expected, $result);
    } 
    public function arrProvider(){
        return [
            ['aaa','43','34','Вы успешно зарегистрированы.'],
            ['bbb','111','222','Такой пользователь существует.']
        ];
    }
}


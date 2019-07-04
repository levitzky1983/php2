<?
trait SomeSay {
    function sayOne(){
        echo "One One One<br>";
    }
    function sayTwo(){
        echo "Two Two Two<br>";
    }
}

class TestSingleton {
    use SomeSay;
    private static $instance;
    private function __construct(){
    }
    private function __clone(){
    }
    private function __wakeup(){
    } 
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new TestSingleton;
        }
        return self::$instance;
    }   
}

TestSingleton::getInstance()->sayOne();
TestSingleton::getInstance()->sayTwo();
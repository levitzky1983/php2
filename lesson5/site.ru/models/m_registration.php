<?php
class M_Registration extends Model {
    public function getData() {
        $name = $_POST['name'];
        $login  = $_POST['login'];
        $pass = $_POST['pass'];
        $db = DB::getInstance();
        $sql = $db->prepare("SELECT * FROM users WHERE `login`=:login");
        $sql->bindParam(':login',$login);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        if(!$result) {
            $sql = $db->prepare("INSERT INTO users (`name`,`login`,`pass`) VALUES (:name, :login, :pass)");
            $sql->bindParam(':name', $name);
            $sql->bindParam(':login', $login);
            $sql->bindParam(':pass', $pass);
            $result = $sql->execute();
            if($result) {
                $str = 'Вы успешно зарегистрированы.';
                header('Location:index.php');
            } else {
                $str = 'Ошибка регистрации';
            }
           
        } else {
            $str = 'Такой пользователь существует.';
        }
        return $str;
    }
}
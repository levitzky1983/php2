<?php
class M_PersonalAccount extends Model {
    public function getData(){
        if(!isset($_SESSION)) {
            Session::init();
        }
        $name = Session::get('name');
        $login = Session::get('login');
        $pages = $_SESSION['pages'];
        $data=array('name'=>$name,'login'=>$login,'pages'=>$pages);
        //print_r($data);
        return $data;
       
    }
}
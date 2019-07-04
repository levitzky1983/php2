<?php
     include_once "../model/model.php";
     if(isset($_POST['beginShow'])) {
        $beginShow = (int)($_POST['beginShow']);
        $countShow = (int)($_POST['countShow']);
        $beginShow = $beginShow + $countShow;
        $goods=getAllHit($connect,$sinks_table,$beginShow,$countShow);
        
       // $goods['show']=$beginShow;
        $goodsJson=json_encode($goods);
        echo($goodsJson);
        mysqli_close($connect);  
    }
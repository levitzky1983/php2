<?php
    include_once "../model/model.php";
    $beginShow = 0;
    $countShow = 2;
    if(isset($_GET['type'])){
        $type = strip_tags($_GET['type']);
        if(isset($_GET['form'])){
            $form = strip_tags($_GET['form']);
        }
        if($type=='steel'){
            $goods = getAllTypeForm($connect,$sinks_table,"`type`",$type,"`form`",$form);
            $headerName = 'Мойки из нержавеющей стали.';
        } elseif($type=='stone'){
            $goods = getAllTypeForm($connect,$sinks_table,"`type`",$type,"`form`",$form);
            $headerName = 'Каменные мойки.';
        }elseif($type=='mix'){
            $goods = getAllType($connect,$sinks_table,$type);
            $headerName = 'Смесители.';
        } elseif($type=='acc'){
            $goods = getAllType($connect,$sinks_table,$type);
            $headerName = 'Аксессуары.';
        } elseif($type=='desk'){
            $goods = getAllType($connect,$sinks_table,$type);
            $headerName = 'Разделочные доски.';
        }      
    } else{
            $goods=getAllHit($connect,$sinks_table,$beginShow,$countShow); 
            $headerName = 'Хит сезона.';
    }

    
   
    if (isset($_GET['id'])) {
        $id = (int)($_GET['id']);
        $good = getOne($connect,$sinks_table,$id);
    }
    mysqli_close($connect);?>
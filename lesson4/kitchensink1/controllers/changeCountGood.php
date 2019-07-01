<?
     include_once "../model/model.php";
     $goods = json_decode($_COOKIE['goods'],true);
     if (isset($_POST['minus'])){
         $id=(int)($_POST['minus']);
         $good = getOne($connect,$sinks_table,$id);  
         for($i=0; $i<count($goods);$i++){
             if($goods[$i]['id_good'] == $good['id']){
                 if($goods[$i]['good_count']!=1){
                     --$goods[$i]['good_count'];
                     $goods[$i]['good_price']-=$good['price'];
                 }
             }
         }
     } elseif(isset($_POST['plus'])){
         $id=(int)($_POST['plus']);
         $good = getOne($connect,$sinks_table,$id);  
         for($i=0; $i<count($goods);$i++){
             if($goods[$i]['id_good'] == $good['id']){
                 ++$goods[$i]['good_count'];
                 $goods[$i]['good_price']+=$good['price'];
             }
         }
     }

     $goodsJson=json_encode($goods);
     setcookie('goods',$goodsJson,time() + 60 * 60 * 24 * 365,"/",'kitchensink');
     echo $goodsJson;
     mysqli_close($connect);
 
    
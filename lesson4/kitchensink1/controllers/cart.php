<?
    include_once "../model/model.php";
    $goods = json_decode($_COOKIE['goods'],true);
    
    if(isset($_POST['id_good'])){
        $id = (int)($_POST['id_good']);
        $good = getOne($connect,$sinks_table,$id);       
        $GoodToAdd = array('id_good'=>$good['id'],'good_article'=>$good['article'],'good_title'=>$good['title'],'good_type'=>$good['type'],'good_form'=>$good['form'],'good_manufacturer'=>$good['manufacturer'],'good_color'=>$good['color'],'good_description'=>$good['description'],'good_info'=>$good['info'],'good_img'=>$good['img'],'good_price'=>$good['price'],'good_img'=>$good['img'],'good_hit'=>$good['hit'],'good_count'=>1);
        for($i=0; $i<count($goods);$i++){
            if($goods[$i]['id_good'] == $GoodToAdd['id_good']) {
                ++$goods[$i]['good_count'];
                --$GoodToAdd['good_count'];
                $goods[$i]['good_price']+=$GoodToAdd['good_price'];
            } 
        }
        if($GoodToAdd['good_count']==1){
            $goods[]=$GoodToAdd;
        }
    }    
    if(isset($_POST['buy'])){
        addOrder($connect,$orders_table);
        unset($goods);
    }

    if(isset($_GET['indexToDelete'])){
        $indexToDelete = (int)($_GET['indexToDelete']);
        for($i=0; $i<count($goods);$i++){
            if($goods[$i]['id_good'] == $indexToDelete){
                unset($goods[$i]);
            }
        }
        $goods=array_values($goods);
        header("Location:../public/cart.php");
    }
    $goodsJson=json_encode($goods);
    setcookie('goods',$goodsJson,time() + 60 * 60 * 24 * 365,"/",'kitchensink');
    mysqli_close($connect);

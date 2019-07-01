<?
class M_Basket extends Model {
    public function getData() {
        $goods = json_decode($_COOKIE['goods'],true);
        return $goods;
    }

    public function addToBasket() {
        $id_good = $_GET['id'];
        $sql = "SELECT good.id as id, good.title as title, good.price as price, good.article as article, good.img as img, color.title as color FROM goods as good ";
        $sql .= "LEFT JOIN colors as color on good.id_color=color.id WHERE good.id = :id"; 
        $good = DB::getRow($sql,[':id'=>$id_good]);

        $goods = json_decode($_COOKIE['goods'],true);  
        $GoodToAdd = array('id_good'=>$good['id'],'good_article'=>$good['article'],'good_title'=>$good['title'],'good_color'=>$good['color'],'good_img'=>$good['img'],'good_price'=>$good['price'],'good_count'=>1);
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
      
    /*if(isset($_POST['buy'])){
        addOrder($connect,$orders_table);
        unset($goods);
    }*/

    
        $goodsJson=json_encode($goods);
        setcookie('goods',$goodsJson,time() + 60 * 60 * 24 * 365,"/",'php2');
        return $goods;
    }

    public function deleteAllBasket() {
        $goods = json_decode($_COOKIE['goods'],true);
        unset ($goods);
        $goodsJson=json_encode($goods);
        setcookie('goods',$goodsJson,time() + 60 * 60 * 24 * 365,"/",'php2');
    }

    public function deleteGoodFromBasket() {
        $id_good = (int)($_GET['id']);
        $goods = json_decode($_COOKIE['goods'],true); 
           
        for($i=0; $i<count($goods);$i++){
            if($goods[$i]['id_good'] == $id_good){
                unset($goods[$i]);
            }
        }
        $goods=array_values($goods);
        $goodsJson=json_encode($goods);
        setcookie('goods',$goodsJson,time() + 60 * 60 * 24 * 365,"/",'php2');
        return $goods;
    }
}
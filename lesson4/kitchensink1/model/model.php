<?php
    include_once "../config/config.php";

    function translate($input){
        $assoc = array(
            'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'j', 'з'=>'z', 'и'=>'i', 'й'=>'i', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'y', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh', 'ы'=>'i', 'э'=>'e', 'ю'=>'u', 'я'=>'ya',
            'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'Yo', 'Ж'=>'J', 'З'=>'Z', 'И'=>'I', 'Й'=>'I', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'Y', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C', 'Ч'=>'Ch', 'Ш'=>'Sh', 'Щ'=>'Sh', 'Ы'=>'I', 'Э'=>'E', 'Ю'=>'U', 'Я'=>'Ya', 'ь'=>'', 'Ь'=>'', 'ъ'=>'', 'Ъ'=>'',
        );
        return $res = strtr($input, $assoc);
    }

    function getAll($connect, $table){
        $query = "SELECT * FROM $table order by 'id' desc";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] =$row; 
            }
            return $data;
        }   
    }
    function getAllType($connect, $table, $type){
        $query = "SELECT * FROM $table WHERE `type`='$type' order by 'id' desc";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] =$row; 
            }
            return $data;
        }   
    }

    function getAllTypeForm($connect, $table,$type,$itemType,$form,$itemForm ){
        $query = "SELECT * FROM $table WHERE $type='$itemType' and $form='$itemForm' order by 'id' desc";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] =$row; 
            }
            return $data;
        }   
    }

    function getAllHit($connect,$table,$begin,$last){
        $query = "SELECT * FROM $table WHERE `hit`=1 order by 'id' desc limit $begin, $last";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $data = array();
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] =$row; 
            }
            return $data;
        }       
    }


    function getOne($connect,$table,$id){
        $query = "SELECT * FROM $table WHERE id= '$id'";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $data = mysqli_fetch_assoc($result); 
        return $data;
    }

    function getOneOrder($connect,$table,$id){
        $query = "SELECT * FROM $table WHERE id_order = '$id'";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        $data = mysqli_fetch_assoc($result); 
        return $data;
    }

    function addOrder($connect,$table){
        $user_name=strip_tags($_POST['name']);
        $user_email=strip_tags($_POST['email']);
        $user_addres=strip_tags($_POST['adres']);
        $user_phone=strip_tags($_POST['phone']);
        $good_delivery=strip_tags($_POST['delivery']);
        $goods = json_decode($_COOKIE['goods'],true);
        foreach ($goods as $good){
            $good_id = $good['id_good'];
            $good_count = $good['good_count'];
            $good_price = $good['good_price'];
            $query = "INSERT INTO $table (client_name, client_phone, client_email, client_addres, id_sink, num, price, delivery,`date`, `status`) VALUES ('$user_name','$user_phone','$user_email','$user_addres','$good_id','$good_count','$good_price','$good_delivery',now(),'new')";
            $res=mysqli_query($connect,$query);
            if(!$res){
                die(mysqli_error($connect));
            } 
        }
    }       

    function author($connect,$table,$login,$pass){
        $query = "SELECT * FROM $table WHERE `login`= '$login' and pass='$pass'";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die(mysqli_error($connect));
        }
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            return true;
        } else {
            return false;
        }
    }

    function deleteGood($connect,$table,$id){
        $sqlNameFIleForDelete = "SELECT img FROM $table WHERE `id` = '$id'";
        //echo $sqlNameFIleForDelete;
        $result = mysqli_query($connect,$sqlNameFIleForDelete);
        //print_r($result);
        if(!$result){
            die(mysqli_error($connect));
        }
        if(mysqli_num_rows($result)>0) {
            $img = mysqli_fetch_assoc($result);
            $fileTodelete = '../public/img/'.PATH_BIG_IMG.$img['img'];
            $fileTodeletePrev = '../public/img/'.PATH_SMALL_IMG.$img['img'];
        } else {
           $str.="Товар не найден.";
        }
    //удаляем картинки
        //$str.=$fileTodelete;
        //$str.=$fileTodeletePrev;

        if(file_exists($fileTodelete)&&file_exists($fileTodeletePrev)) {
            if(unlink($fileTodelete)&&unlink($fileTodeletePrev)) {
                $str.= "Файлы изображений удалены. ";
            } else {
                $str.= "Файлы изображений не удалены. ";            
            }
        } else {
            $str.= "Файлы изображений не сущесвуют. ";          
        }
    //удаляем из БД
        $sqlDelete = "DELETE FROM $table WHERE id='$id'";
        $res = mysqli_query($connect,$sqlDelete);
        if(!$res){
            $str.= "Ошибка удаления из БД.";
            die(mysqli_error($connect));
        }
    //Проверяем удалено ли из БД    
        $result = mysqli_query($connect,$sqlNameFIleForDelete);
        if(!$result){
            die(mysqli_error($connect));
        }
        if (mysqli_num_rows($result) > 0) {
            $str.=" Данные из БД не удалены.";
        } else {
            $str.=" Данные из БД  удалены.";
        }
        return $str;
    }

    function updateGood($connect,$table,$id,$article,$title,$type,$form,$manufacturer,$color,$description,$info,$img,$price,$hit) {
        $sqlUpdateProduct = "UPDATE $table SET `article`='".$article."',title='".$title."',`type`='".$type."',form='".$form."',manufacturer='".$manufacturer."',color='".$color."',`description`='".$description."',info='".$info."',img='".$img."',price='".$price."',hit='".$hit."' WHERE id='$id'";
        $res = mysqli_query($connect,$sqlUpdateProduct);
        if(!$res){
            die(mysqli_error($connect));
        }
        $data = getOne($connect,$table,$id);
        return $data;
    }

    function updateStatus($connect,$table,$id,$status){
       $query = "UPDATE $table SET `status`='$status' WHERE id_order='$id'";
       $res = mysqli_query($connect,$query);
       if(!$res){
           die(mysqli_error($connect));
       }
       $data = getOneOrder($connect,$table,$id);
       return $data;
    }

    function addGood($fileName,$fileNamesTmp,$fileSize,$fileError,$fileBigPath,$fileSmallPath,$connect, $table,$article,$title,$type,$form,$manufacturer,$color,$description,$info,$price,$hit){
        if($fileError) {
            $message .= "Загрузка не удалась.";
        } elseif($fileSize > 10000000) {
            $message .= 'Файл слишком большой.';
        } elseif (nameСomparison($fileName,'../public/img/'.PATH_BIG_IMG)) {
            $message .= 'Файл с таким именем уже существует.';
        } elseif (move_uploaded_file($fileNamesTmp,$fileBigPath.$fileName)) {
                //resize
            resizeImg($fileName,$fileBigPath,$fileSmallPath);
                //добавляем в бд
            $addsql = "INSERT INTO  $table (`article`,title,`type`,form,manufacturer,color,`description`,info,img,price,hit) VALUES ('$article','$title','$type','$form','$manufacturer','$color','$description','$info','$fileName','$price','$hit')";
            $result = mysqli_query($connect,$addsql);
            if(!$result){
                $message .= 'Товар не добавлен в БД.';
                die(mysqli_error($connect));
            } else {
                    $message .= 'Товар добавлен в БД.'; 
            }
        }
        return $message;    
    }

    function nameСomparison($name,$path) {
        $arrName = scandir($path);
        if (in_array($name,$arrName)) {
            return true; 
        }
        return false;    
    }

    function resizeImg($fileName,$path,$newPath){
        $size=GetImageSize ($path.$fileName);
        $src=ImageCreateFromJPEG ($path.$fileName);
        $iw=$size[0];
        $ih=$size[1];
        $koe=$iw/250;  
        $new_h=ceil ($ih/$koe);  
        $dst=ImageCreateTrueColor (250, $new_h); 
        ImageCopyResampled ($dst, $src, 0, 0, 0, 0, 250, $new_h, $iw, $ih);  
        ImageJPEG ($dst, $newPath.$fileName, 100);
    }

    function deleteOrder($connect,$table,$id){
        $query = "DELETE FROM $table WHERE id_order = '$id'";
        $res = mysqli_query($connect,$query);
        if(!$res){
            die(mysqli_error($connect));
        }   
    }

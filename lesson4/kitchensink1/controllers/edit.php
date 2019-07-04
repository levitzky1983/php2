<?php
        include_once "../model/model.php";
        if (isset($_POST['id'])) {
            $article = strip_tags($_POST['article']);
            $title = strip_tags($_POST['title']);
            $type = strip_tags($_POST['type']);
            $form = strip_tags($_POST['form']);
            $manufacturer = strip_tags($_POST['manufacturer']);
            $color = strip_tags($_POST['color']);
            $price = (int)($_POST['price']);
            $info = strip_tags($_POST['info']);
            $description = strip_tags($_POST['description']);
            $hit = strip_tags($_POST['hit']);
            $id=(int)($_POST['id']);
            $prev_img = strip_tags($_POST['prev_img']);
            $fileTodelete = '../public/img/'.PATH_BIG_IMG.$prev_img;
            $fileTodeletePrev = '../public/img/'.PATH_SMALL_IMG.$prev_img;
            //print_r($_FILES);
            if(!empty($_FILES['img']['name'])){
                $fileNamesTmp = $_FILES["img"]["tmp_name"];
                $fileName = $_FILES['img']['name'];
                $fileSize = $_FILES['img']['size'];
                $fileError = $_FILES['img']['error'];
                $fileBigPath = "../public/img/".PATH_BIG_IMG;
                $fileSmallPath = "../public/img/".PATH_SMALL_IMG;
                if($fileError) {
                    die();
                } elseif($fileSize > 10000000) {
                    die();
                } elseif (nameСomparison($fileName,'../public/img/'.PATH_BIG_IMG)) {
                    die();
                } elseif (move_uploaded_file($fileNamesTmp,$fileBigPath.$fileName)) {
                    resizeImg($fileName,$fileBigPath,$fileSmallPath);
                    $result = updateGood($connect,$sinks_table,$id,$title,$type,$manufacturer,$color,$description,$info,$fileName,$price);
                    unlink($fileTodelete);
                    unlink($fileTodeletePrev);
                }
               
            } else{
                $result = updateGood($connect,$sinks_table,$id,$article,$title,$type,$form,$manufacturer,$color,$description,$info,$prev_img,$price,$hit);
            }
            $resultJson = json_encode($result);
            echo $resultJson;
            //echo $prev_img;
        }
        mysqli_close($connect);

?>

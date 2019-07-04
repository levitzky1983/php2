<?
    include_once "../model/model.php";
    session_start();
    if(isset($_POST['auth'])&&isset($_POST['login'])&&isset($_POST['pass'])){
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $auth=author($connect,$admin_table,$login,$pass);
        if($auth){
            $_SESSION['auth'] = $auth;
        } else {
            header("Location:admin.php");
        }
    }
    if($_SESSION['auth']){
        if(isset($_POST['exit'])){
            unset($_SESSION['auth']);
            header("Location:admin.php");
        }
        $goods = getAll($connect,$sinks_table);   
        $orders  = getAll($connect,$orders_table);  
    }

    if(isset($_POST['add'])){
        $article = strip_tags($_POST['article']);
        $title = strip_tags($_POST['title']);
        $type = strip_tags($_POST['type']);
        $form = strip_tags($_POST['form']);
        $manufacturer = strip_tags($_POST['manufacturer']);
        $color = strip_tags($_POST['color']);
        $description = strip_tags($_POST['description']);
        $info = strip_tags($_POST['info']);
        $price = (int)($_POST['price']);
        $hit = (int)($_POST['hit']);
        $fileNamesTmp = $_FILES["img"]["tmp_name"];
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileError = $_FILES['img']['error'];
        $fileBigPath = "../public/img/".PATH_BIG_IMG;
        $fileSmallPath = "../public/img/".PATH_SMALL_IMG;
        $message = addGood($fileName,$fileNamesTmp,$fileSize,$fileError,$fileBigPath,$fileSmallPath,$connect,$sinks_table,$title,$article,$type,$form,$manufacturer,$color,$description,$info,$price,$hit);
    }

    /*if (isset($_POST['id_good'])&&isset($_POST['delete'])){
        $id = (int)($_POST['id_good']);
        $message = deleteGood($connect,$sinks_table,$id);
    }*/

    if(isset($_GET['indexToDelete'])){
        $orderToDelete = (int)($_GET['indexToDelete']);
        deleteOrder($connect,$orders_table,$orderToDelete);
    }
    mysqli_close($connect);
   
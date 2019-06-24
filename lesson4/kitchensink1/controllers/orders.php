<?
    include_once "../model/model.php";
    if(isset($_POST['indexToChange'])){
        $id = (int)($_POST['indexToChange']);
        $status = strip_tags($_POST['status']);
        $result = updateStatus($connect,$orders_table,$id,$status);
        echo $result['status'];
        mysqli_close($connect);
    }
<?
    include_once "../model/model.php";
    if (isset($_POST['id_good'])){
        $id = (int)($_POST['id_good']);
        $message = deleteGood($connect,$sinks_table,$id);
   // echo $message;
    }
    
    //echo "<p><a href='admin.php>Вернуться</a><p>";
    header("Location:admin.php");
    //echo "<a href = 'admin.php'>Вернуться<a>";
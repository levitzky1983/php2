<?
     include_once "../controllers/admin.php";
     include_once "../controllers/orders.php";
     if (!$_SESSION['auth']){
        header("Location:admin.php");
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../public/css/style.css">
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/script.js"></script>
    </head>
        <title>Заказы</title>
    </head>
    <body>
        <? include "../templates/header.php";?>
        <main>
            <table style = 'border:1px solid black; background-color: white;'>
            <caption><b>ЗАКАЗЫ.</b></caption>
            <thead ><tr><th style = 'border:1px solid black'>Номер заказа</th><th style = 'border:1px solid black'>Имя клиента</th><th style = 'border:1px solid black'>Телефон клиента</th><th style = 'border:1px solid black'>Почта клиента</th><th style = 'border:1px solid black'>Адрес клиента</th><th style = 'border:1px solid black'>id товара</th><th>Количество</th><th style = 'border:1px solid black'>Цена</th><th style = 'border:1px solid black'>Дата заказа</th><th style = 'border:1px solid black'>Статус</th><th style = 'border:1px solid black'>Удалить</th></tr></thead>
            <tbody>
            <?foreach($orders as $order){
                $str ="<tr>";
                $str.="<td style = 'border:1px solid black'>".$order['id_order']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['client_name']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['client_phone']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['client_email']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['client_addres']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['id_sink']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['num']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['price']."</td>";
                $str.="<td style = 'border:1px solid black'>".$order['date']."</td>";
                $str.="<td style = 'border:1px solid black'><select onchange='changeStatus(this.value,".$order['id_order'].")'><option id='actual_status_".$order['id_order']."' value=".$order['status'].">".$order['status']."</option><option value='new'>new</option><option value='in_use'>in_use</option><option value='post'>post</option></select></td>";
                $str.="<td style = 'border:1px solid black'><a href='orders.php?indexToDelete=".$order['id_order']."' class='button'>Удалить</a></td>";
                $str.="</tr>";
                echo $str;
            }?>
            </tbody>
            <tfoot><tr><th colspan='3'>Информация по состоянию на <?=date('F j, Y, g:i a')?></th></tr></tfoot>
            </table>
            <a href="admin.php">Вернуться</a>
        </main>
        <? include "../templates/footer.php";?>    
    </body>
    </html>

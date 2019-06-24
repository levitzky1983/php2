<?php
define("MYSQL_SERVER","localhost");
define("MYSQL_USER","root");
define("MYSQL_PASSWORD","");
define("MYSQL_DB","kitchen_sinks");

define("PATH_BIG_IMG","uploads/");
define("PATH_SMALL_IMG","uploads/prev/");
$sinks_table = "sinks";
//$mix_table = "mixers";
//$acc_table = "accessories";
//$desk_table = "desk";
$orders_table = "orders";
$admin_table = "admin";


$connect = mysqli_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB) or die("Error: ".mysqli_error($connect));
if(!mysqli_set_charset($connect, "utf8")){
    printf("Error: ".mysqli_error($connect));
}



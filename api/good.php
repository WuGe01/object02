<?php
include_once "../css/base2.php";
$id=$_POST['id'];
$type=$_POST['type'];
$user=$_POST['user'];

switch ($type) {
    case '1':
        $log->save(['news'=>$id,'user'=>$user]);
        break;
    case '2':
        $log->del(['news'=>$id,'user'=>$user]);
        break;

}


?>
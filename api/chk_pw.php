<?php
include_once "../css/base2.php";
$db=new DB("user");
$acc=$_GET['acc'];
$pw=$_GET['pw'];
$chk=$db->find(['acc'=>$acc,'pw'=>$pw]);

if(empty($chk)){
    echo 0;
}else{
    echo 1;
    $_SESSION['login']=$acc;
}




?>
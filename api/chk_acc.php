<?php
include_once "../css/base2.php";
if(!empty($_GET['acc'])){
$table=new DB('user');
$acc=$_GET['acc'];
$chk=$table->find(['acc'=>$acc]);
if(empty($chk)) echo 0 ;
else echo 1;
}


?>
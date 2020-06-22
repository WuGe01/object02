<?php
include_once "../css/base2.php";
$db=new DB('user');
$acc=$_POST['acc'];
$pw=$_POST['pw'];
$email=$_POST['email'];
echo $db->save(['acc'=>$acc,'pw'=>$pw,'email'=>$email]);
?>
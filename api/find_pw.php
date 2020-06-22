<?php
include_once "../css/base2.php";
$email=$_GET['email'];
$db=new DB('user');
$u=$db->find(['email'=>$email]);

if(empty($u))echo "查無此帳號";
else echo "您的密碼為:".$u['pw'];

?>
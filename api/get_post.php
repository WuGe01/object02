<?php
include_once "../css/base.php";
$db=new DB('news');
$id=$_GET['e'];
$rows=$db->find($id);


echo "<pre>".$rows['text']."</pre>";



?>
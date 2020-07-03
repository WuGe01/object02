<?php
include_once "../css/base.php";
$db=new DB('news');
$type=$_GET['aa'];
$rows=$db->all(['type'=>$type]);

foreach ($rows as $r) {
    echo "<a class='list-item' onclick='showPost(".$r['id'].")''>";
    echo $r['title'];
    echo "</a>";
}


?>
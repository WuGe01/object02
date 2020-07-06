<?php
include_once "../css/base2.php";
if(!empty($_POST['select'])){
    $id=$_POST['id'];
    $select=$_POST['select'];
    $row=$que->find($select);
    $sub=$que->find($id);
    $row['count']++;
    $sub['count']++;
    $que->save($row);
    $que->save($sub);
}
to("../index.php?do=que");
?>
<?php
include_once "../css/base2.php";
if($_POST['del']){
    foreach($_POST['del'] as $id){
        $user->del($id);
    }
}




to("../admin.php?do=acc");
?>
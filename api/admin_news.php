<?php
include_once "../css/base2.php";
foreach ($_POST['id'] as $key => $id) {
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $news->del($id);
    }else{
        $row=$news->find($id);
        $row['sh']=(!empty($_POST['sh'])&& in_array($id,$_POST['sh']))?1:0;
        $news->save($row);
    }
}
to("../admin.php?do=news");
?>
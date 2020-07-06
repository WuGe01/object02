<?php
include_once "../css/base2.php";
if(!empty($_POST['subject'])){
    $que->save([
        'text'=>$_POST['subject'],
        'parent'=>0,
        'count'=>0
    ]);
    $parent=$que->find(['text'=>$_POST['subject']]);
        if(!empty($_POST['options'])){
            foreach($_POST["options"] as $opt){
                $date=[
                    'text'=>$opt,
                    'parent'=>$parent['id'],
                    'count'=>0
                ];
                $que->save($date);
            }
        }
}
to('../admin.php?do=que');
?>
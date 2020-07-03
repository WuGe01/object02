<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="60%">內容</td>
            <td width="10%"></td>
        </tr>
<?php
    $db=new DB('news');
    $rows=$db->all();
    foreach ($rows as $r ) {
        
    

?>
        <tr>
            <td><?=$r['title'];?></td>
            <td><?=mb_substr($r['text'],0,20,'utf8');?>...</td>
            <td></td>
       </tr>
<?php
    }
?>
    </table>
</fieldset>
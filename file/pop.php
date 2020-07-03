<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="60%">內容</td>
            <td width="10%">人氣</td>
        </tr>
<?php
    $db=new DB('news');
    $rows=$db->all();
    $total=$db->count();
    $div=5;
    $pages=ceil($total/$div);
    $now=(!empty($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$db->all([]," order by good desc limit $start,$div");

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
 <?php
    
    if(($now-1)>0) echo "<a href='?do=news&p=".($now-1)."'><</a>";

    for ($i=1; $i <= $pages; $i++) { 
        $TextSize=($i==$now)?'24px':'18px';
        echo "<a href='?do=news&p=$i' style='font-size:$TextSize;'>$i</a>";
    }

    if(($now+1)<= $pages) echo "<a href='?do=news&p=".($now+1)."'>></a>";
?>
</fieldset>
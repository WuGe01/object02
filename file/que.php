<fieldset>
    <legend>目前位置:首頁>問券調查</legend>
    <table>
    <tr style="font-weight:bold">
        <td>編號:</td>
        <td width="70%">問卷題目:</td>
        <td>投票結果</td>
        <td>結果</td>
        <td>狀態</td>
    </tr>
<?php
    $rows=$que->all(['parent'=>0]);
    foreach($rows as $key => $r) {

?>
    <tr>
        <td><?=$key+1;?></td>
        <td><?=$r['text'];?></td>
        <td><?=$r['count'];?></td>
        <td><a href="?do=result&q=<?=$r['id'];?>">結果</a></td>
        <td>
<?php
        if(!empty($_SESSION['login'])){
            
            echo "<a href='?do=vote&q=".$r['id']."'>參與投票</a>";
        }else{
            echo "請先登入";
           
        }
?>
        </td>
    </tr>
<?php
 }
?>
    </table>
</fieldset>

<style>
    .all{
        display: none;
    }
    .title{
        cursor:pointer;
        background-color:#EEE;
    }
</style>
<fieldset>
    <legend>最新文章管理</legend>
    <form action="./api/admin_news.php" method="post">
    <table>
        <tr>
            <td width="10%">標題</td>
            <td width="70%">內容</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
        </tr>
<?php
        $rows=$news->all();
        $total=$news->count();
        $div=3;
        $pages=ceil($total/$div);
        $now=(!empty($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$div;
        $rows=$news->all([]," order by good desc limit $start,$div");
        foreach($rows as $row){
        $ckeced=($row['sh']==1)?"checked":"";
?>

<tr class="=ct">
    <td><?=$row['id'];?></td>
    <td><?=$row['title'];?></td>
    <td>
        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=$ckeced;?>> 
    </td>
    <td>
        <input type="checkbox" name="del[]" value="<?=$row['id'];?>"> 
        <input type="hidden" name="id[]" value="<?=$row['id'];?>"> 
    </td>
</tr>
<?php
        }
?>
    </table>
    <div style="margin: auto;text-align: center;">
    <?php
    
    if(($now-1)>0) echo "<a href='admin.php?do=news&p=".($now-1)."'><</a>";

    for ($i=1; $i <= $pages; $i++) { 
        $TextSize=($i==$now)?'24px':'18px';
        echo "<a href='admin.php?do=news&p=$i' style='font-size:$TextSize;'>$i</a>";
    }

    if(($now+1)<= $pages) echo "<a href='admin.php?do=news&p=".($now+1)."'>></a>";
?>
    </div>
    <div class="ct">
        <input type="submit" value="確認">

    </div>



    </form>
</fieldset>
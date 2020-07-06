<?php
$q=$_GET['q'];
$subject=$que->find($q);
$options=$que->all(['parent'=>$q]);
?>
<form action="./api/vote.php" method="post">
    <fieldset>
        <legend>目前位置:首頁>問券調查><?=$subject['text'];?></legend>
        <h3><?=$subject['text'];?></h3>
        <table>
        <tr style="font-weight:bold">
            <td ></td>
            <td ></td>
        </tr>
    <?php
        foreach($options as $key => $r) {
    ?>
        <tr>
            <td><input type="radio" name="select" value="<?=$r['id'];?>"></td>
            <td><?=$key+1;?>.<?=$r['text'];?></td>
        </tr>
    <?php
     }
    ?>
    </table>
    <div class='ct'>
    <input type="submit" value="我要投票" >
    <input type="hidden" name="id" value="<?=$q;?>" >
    <!-- <input type="button" value="返回" onclick="javascript:location.href='?do=que'"> -->
    </div>
    </fieldset>
</form>

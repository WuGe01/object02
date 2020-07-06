<?php
$q=$_GET['q'];
$subject=$que->find($q);
$options=$que->all(['parent'=>$q]);
?>
<fieldset>
    <legend>目前位置:首頁>問券調查><?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <table>
    <tr style="font-weight:bold">
        <td width="60%"></td>
        <td ></td>
    </tr>
<?php
    foreach($options as $key => $r) {
        $total=($subject['count']==0)?1:$subject['count'];
        $rate=round($r['count']/$total,2);
?>
    <tr>
        <td><?=$key+1;?>.<?=$r['text'];?></td>
        <td><div style="width:<?=$rate*200;?>px;background-color: gray;display: inline-block;height: 20px;margin-right: 10px;"></div><?=$r['count'];?>票(%)</td>

        </td>
    </tr>
<?php
 }
?>
</table>
<div class='ct'><input type="button" value="返回" onclick="javascript:location.href='?do=que'"></div>
</fieldset>

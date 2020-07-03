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
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="60%">內容</td>
            <td width="10%"></td>
        </tr>
<?php
    $rows=$news->all();
    $total=$news->count();
    $div=5;
    $pages=ceil($total/$div);
    $now=(!empty($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$news->all([]," limit $start,$div");

    foreach ($rows as $r ) {
    

?>
        <tr>
            <td class="title"><?=$r['title'];?></td>
            <td>
                <div class="abbr"><?=mb_substr($r['text'],0,20,'utf8');?>...</div>
                <div class="all"><?=nl2br($r['text']);?></div>
            </td>
            <td>
<?php
                if(!empty($_SESSION['login'])){
                  
                  $chk=$log->count(['user'=>$_SESSION['login'],'news'=>$r['id']]);
                  if($chk==0) echo "<a href='#' id='good".$r['id']."' onclick='god(".$r['id'].",1,&#39;".$_SESSION['login']."&#39;)'>讚</a>";
                  else echo "<a href='#' id='good".$r['id']."' onclick='god(".$r['id'].",2,&#39;".$_SESSION['login']."&#39;)'>收回讚</a>";
                }

?>

  
            </td>
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
<script>

    $(".title").on("click",function(){
        // console.log($(this).next().children('abbr').hide)
        $(this).next().children('.abbr').toggle();
        $(this).next().children('.all').toggle();
        
    })
</script>
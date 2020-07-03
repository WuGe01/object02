<style>
    fieldset{
        display:inline-block;
        vertical-align: top;
        margin-top: 20px;
    }
    .item,
    .list-item{
        display: block;
        margin: 5px 10px;
    }
</style>
<div>目前位置:首頁 >分類網誌 ><span id="navv">健康新知</span></div>
<fieldset>
    <legend>分類網誌</legend>
    <a class="item" href="javascript:showList(0)">健康新知</a>  
    <a class="item" href="javascript:showList(1)">菸害防治</a>
    <a class="item" href="javascript:showList(2)">癌症防治</a>
    <a class="item" href="javascript:showList(3)">慢性病防治</a>
</fieldset>
<fieldset>
    <legend>文章列表</legend>
    <div class="list"></div>
    <div class="text"></div>

</fieldset>
<script>
    showList(0);
    function showList(e) {
        $(".text").html("")
 
        let bb = $('.item').eq(e).html()
        $('#navv').html(bb)
        let aa =(e+1)
        $.get("./api/get_list.php",{aa},(res)=>{
            $(".list").html(res)
        })
    }
    function showPost(e){
        $(".text").html("")
        $(".list").html("")

        $.get("./api/get_post.php",{e},(res)=>{
            $(".text").html(res)
        })
    }
</script>
<fieldset style="margin:auto;padding:10px;width:50%;">
    <legend>忘記密碼</legend>
    <form action="">
<table>
    <tr>
        <td>請輸入信箱以查詢密碼</td>
    </tr>
    <tr>
        <td><input style="width:220%" type="text" name="acc" id="email"></td>
    </tr>
    <tr>
        <td>
            <div id="res"></div>

        </td>
    </tr>
    <tr>
        <td><input type="button" value="尋找" onclick="findPW()"></td>
    </tr>
</table>

</form>
</fieldset>
<script>
function findPW(){
    let email=$('#email').val();
    if(email== "") alert("欄位不可為空白");
    else{
        $.get('./api/find_pw.php',{email},(e)=>{
            $('#res').html(e);
        })
    }

}






</script>





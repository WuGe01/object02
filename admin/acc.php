<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/admin_acc.php" method="post">
    <table style="margin: auto;width: 50%;">
        <tr class="=ct clo">
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
<?php
        $rows=$user->all();
        foreach($rows as $row){
        if($row['acc']!='admin'){
?>

<tr class="=ct">
    <td><?=$row['acc'];?></td>
    <td><?=str_repeat('*',strlen($row['pw']));?></td>
    <td>
        <input type="checkbox" name="del[]" value="<?=$row['id'];?>"> 
    </td>
</tr>


<?php
        }}
?>
    </table>
    <div class="ct">
        <input type="submit" value="確認刪除">
        <input type="reset" value="清空選取">
    </div>
    </form>
</fieldset>
<h2>新增會員</h2>
<form  action="./api/admin_acc.php" method="post">
<table style="margin: auto;width: 50%;">
    <tr>
        <td colspan="2" style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
    </tr>
    <tr>
        <td class="clo cloaa">Step1:登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="clo cloaa">Step2:登入密碼</td>
        <td><input type="text" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="clo cloaa">Step3:再次確認密碼</td>
        <td><input type="text" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td class="clo cloaa">Step4:信箱(忘記密碼時使用)</td>
        <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td><input class="cloaa" type="button" value="註冊" onclick="reg()"><input class="cloaa" type="reset" value="清除"></td>

    </tr>
</table>
</form>
<script>
    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if(acc == "" || pw == "" || pw2 == "" || email == ""){
            alert("不可空白");
        }else{
            if(pw==pw2){
                $.get('api/chk_acc.php',{acc},(e)=>{
                    if(e ==='1'){
                        alert("帳號重複")
                    }
                    else{ 
                        $.post("api/reg.php",{acc,pw,email},(e)=>{
                        if(e==='1'){
                            alert("註冊完成歡迎加入");
                            location.reload();
                        }else{
                            alert("註冊失敗請聯絡管理員");
                        } 
                    })}
                })
            }else{
                alert("密碼錯誤");
            }
        }
    }
</script>
<fieldset style="margin:auto;padding:10px;width:50%;">
    <legend>會員註冊</legend>
<form action="">
<table>
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
</fieldset>
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
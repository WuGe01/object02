<fieldset>
    <legend>新增問卷</legend>
   <form action="./api/admin_que.php" method="POST">
       <table>
           <tr>
               <td  class="clo">問卷名稱</td>
               <td><input type="text" name="subject"></td>
           </tr>
           <tr>
               <td colspan="2" class="clo" id="opts">
                <div>選項:<input type="text" name="options[]" ><input type="button" value="更多" onclick="moreOne()"></div>     
               </td>
           </tr>
       </table>
       <div>
        <input type="submit" value="確認">
        <input type="reset" value="清空">
    </div>
   </form>
</fieldset>
<script>
    function moreOne() {
        let str=`<div>選項:<input type="text" name="options[]" ></div>`
        $('#opts').prepend(str);
    }
</script>
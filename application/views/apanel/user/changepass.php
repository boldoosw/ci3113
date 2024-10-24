<title>Хэрэглэгч</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open(base_url("apanel/user/changepasssave")); ?>
        <table cellpadding="5" border="0" align="left" class="table-border-none">
            <tr class='tablebody'>
                <td>Хуучин нууц үг</td>
                <td></td>
                <td><input type="password" name="oldloginpass"></td>
                <td><?php if(isset($error)) {echo "<div style='color:red;font-weight:bold;'>".$error."</div>";} ?></td>
            </tr>
            <tr class='tablebody'>
                <td>Нууц үг</td>
                <td></td>
                <td><input type="password" name="loginpass"></td>
                <td><?php if(isset($error1)) {echo "<div style='color:red;font-weight:bold;'>".$error1."</div>";} ?>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Нууц үгээ дахин</td>
                <td></td>
                <td><input type="password" name="loginpass1"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><button type="submit">Хадгалах</button></td>
            </tr>
        </table>
        <input type="hidden" name="userid" value="<?php if(isset($user[0]->ids)) {echo $user[0]->ids; };?>">
        </form>
    </div>
</div>
</body>

</html>
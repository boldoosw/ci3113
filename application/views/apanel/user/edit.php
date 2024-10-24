<title>Хэрэглэгч</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open(base_url("apanel/user/save")); ?>
        <table cellpadding="5" border="0" align="left" class="table-border-none">
            <tr class='tablebody'>
                <td>Хэрэглэгч</td>
                <td></td>
                <td><input type="text" name="loginname" value=<?php if(isset($loginname)){echo $loginname;}?>></td>
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
            <tr class='tablebody'>
                <td>Түвшин</td>
                <td></td>
                <td>
                    <select name="level">
                        <option value="0"
                            <?php if(isset($user[0]->level)) {if($user[0]->level==0) {echo "selected";}}?>>User</option>
                        <option value="1"
                            <?php if(isset($user[0]->level)) {if($user[0]->level==1) {echo "selected";}}?>>Admin
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><button type="submit">Хадгалах</button>
                    <a href="<?=base_url("apanel/user");?>">Болих</a>
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</body>

</html>
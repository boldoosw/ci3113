<title>SocialMedia</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open_multipart(base_url("apanel/socialmedia/save")); ?>
        <table cellpadding="5" border="0" align="left" class="table-border-none">
            <tr class='tablebody'>
                <td>SocialMedia</td>
                <td></td>
                <td>
                    <select name="type" id="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option
                            <?php if(isset($socialmedia[0]->type)) { if($socialmedia[0]->type=='facebook') {echo 'selected'; }} ?>
                            value="facebook">Facebook
                        </option>
                        <option
                            <?php if(isset($socialmedia[0]->type)) { if($socialmedia[0]->type=='youtube') {echo 'selected'; }} ?>
                            value="youtube">Youtube
                        </option>
                        <option
                            <?php if(isset($socialmedia[0]->type)) { if($socialmedia[0]->type=='instagram') {echo 'selected'; }} ?>
                            value="instagram">Instagram</option>
                        <option
                            <?php if(isset($socialmedia[0]->type)) { if($socialmedia[0]->type=='linkedn') {echo 'selected'; }} ?>
                            value="linkedin">Linkedin</option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Link</td>
                <td></td>
                <td><input type="text" name="link"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($socialmedia[0]->link)) {echo $socialmedia[0]->link; };?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Хадгалах
                    </button>
                    <a href="<?=base_url("apanel/socialmedia");?>">
                        <button type="button"
                            class="text-black hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Болих
                        </button>
                    </a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="socialmediaid"
            value="<?php if(isset($socialmedia[0]->id)) {echo $socialmedia[0]->id; };?>" />
        </form>
    </div>
</div>
</body>

</html>
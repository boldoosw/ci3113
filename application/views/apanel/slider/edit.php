<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open_multipart(base_url("apanel/slider/save")); ?>
        <table cellpadding="5" border="0" align="left" class="table-border-none">
            <tr class='tablebody'>
                <td>Гарчиг</td>
                <td></td>
                <td><input type="text" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($slider[0]->title)) {echo $slider[0]->title; };?>"></td>
            </tr>
            <tr class='tablebody'>
                <td valign="top">Тайлбар</td>
                <td></td>
                <td>
                    <textarea name="info"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php if(isset($slider[0]->info)) {echo $slider[0]->info; };?></textarea>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Зураг</td>
                <td></td>
                <td>
                    <input type="file" name="sliderpic"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Байршил</td>
                <td></td>
                <td>
                    <select name="position" id="position"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="top">Top</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="footer">Footer</option>
                        <option value="reels">Reels</option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Линк</td>
                <td></td>
                <td><input type="text" name="link"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($slider[0]->link)) {echo $slider[0]->link; };?>"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Хадгалах
                    </button>
                    <a href="<?=base_url("apanel/slider");?>">
                        <button type="button"
                            class="text-black hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Болих
                        </button>
                    </a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="sliderid" value="<?php if(isset($slider[0]->id)) {echo $slider[0]->id; };?>" />
        <input type="hidden" name="sliderpicurl"
            value="<?php if(isset($slider[0]->picurl)) {echo $slider[0]->picurl; };?>" />
        <input type="hidden" name="slidersmallpicurl"
            value="<?php if(isset($slider[0]->small_picurl)) {echo $slider[0]->small_picurl; };?>" />
        </form>
    </div>
</div>
</body>

</html>
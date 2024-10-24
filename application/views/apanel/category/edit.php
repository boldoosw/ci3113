<title>Category</title>
<script src="<?=base_url('ckeditor/ckeditor.js');?>" type="text/javascript"></script>
<div class="container mt-5">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open_multipart(base_url("apanel/category/save")); ?>
        <table cellpadding="5" border="0" class="table-border-none">
            <tr class='tablebody'>
                <td align="right">Нүүрний зураг</td>
                <td></td>
                <td>
                    <div class="flex justify-items-center items-baseline">
                        <input type="file" name="categorypic" id="categorypic"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <button type="button" onclick="picclear()"
                            class="text-black bg-gray-300 w-48 ml-2 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Зураг
                            арилгах
                        </button>
                    </div>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right">Сategory төрөл</td>
                <td></td>
                <td>
                    <select name="category_type_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php 
							for($i=0;$i<count($categorytype);$i++)
							{ ?>

                        <option value="<?=$categorytype[$i]->id;?>"
                            <?php if(isset($category[0]->category_type_id)) {if($category[0]->category_type_id==$categorytype[$i]->id) {echo "selected";}} ?>>
                            <?=$categorytype[$i]->title;?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right">Гарчиг</td>
                <td></td>
                <td><input type="text" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($category[0]->title)) {echo $category[0]->title; };?>"></td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Товч мэдээ</td>
                <td></td>
                <td>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="description"><?php if(isset($category[0]->description)){echo $category[0]->description;}?></textarea>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Мэдээ</td>
                <td></td>
                <td>
                    <textarea name="info"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php if(isset($category[0]->info)){echo $category[0]->info;}?></textarea>
                    <script type="text/javascript">
                    CKEDITOR.replace('info', {
                        "extraPlugins": 'imagebrowser,justify,font',
                        "imageBrowser_listUrl": "<?=base_url('apanel/browserfile');?>",
                        "filebrowserUploadUrl": "<?=base_url('apanel/upload');?>",
                        allowedContent: true,
                        width: "800",
                        height: "300",
                        language: "en"
                    });
                    </script>
                </td>
            </tr>
            <!-- <tr class='tablebody'>
                <td align="right" valign="top">Онцлох</td>
                <td></td>
                <td>
                    <select name="highlight" id="highlight"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Үгүй</option>
                        <option value="1"
                            <?php if(isset($category[0]->highlight)) { if($category[0]->highlight==1) {echo "selected";}} ?>>
                            Онцлох</option>
                    </select>
                </td>
            </tr> -->
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Хадгалах
                    </button>
                    <a href="<?=base_url("apanel/category");?>">
                        <button type="button"
                            class="text-black hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Болих
                        </button>
                    </a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="categoryid" value="<?php if(isset($category[0]->id)) {echo $category[0]->id; };?>">
        <input type="hidden" name="categorypicurl" id="categorypicurl"
            value="<?php if(isset($category[0]->picurl)) {echo $category[0]->picurl; };?>" />
        <input type="hidden" name="categorysmallpicurl" id="categorysmallpicurl"
            value="<?php if(isset($category[0]->small_picurl)) {echo $category[0]->small_picurl; };?>" />
        </form>
    </div>
</div>

<script type="text/javascript">
function picclear() {
    document.getElementById("categorypicurl").value = "";
    document.getElementById("categorysmallpicurl").value = "";
}
</script>
</body>

</html>
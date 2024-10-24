<title>productitem</title>
<script src="<?=base_url('ckeditor/ckeditor.js');?>" type="text/javascript"></script>
<div class="container mt-5">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open_multipart(base_url("apanel/product/save")); ?>
        <table cellpadding="5" border="0" class="table-border-none">
            <tr class='tablebody'>
                <td align="right">Нүүрний зураг</td>
                <td></td>
                <td>
                    <div class="flex justify-items-center items-baseline">
                        <input type="file" name="productpic" id="productpic"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <button type="button" onclick="picclear()"
                            class="text-black bg-gray-300 w-48 ml-2 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Зураг
                            арилгах
                        </button>
                    </div>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right">Category</td>
                <td></td>
                <td>
                    <select name="menuid"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php 
							for($i=0;$i<count($category);$i++)
							{ ?>
                        <option value="<?=$category[$i]->id;?>"
                            <?php if(isset($product[0]->categoryid)) {if($product[0]->categoryid==$category[$i]->id) {echo "selected";}} ?>>
                            <?=$category[$i]->title;?></option>

                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right">Гарчиг</td>
                <td></td>
                <td><input type="text" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($product[0]->title)) {echo $product[0]->title; };?>"></td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Товч мэдээ</td>
                <td></td>
                <td>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="description"><?php if(isset($product[0]->description)){echo $product[0]->description;}?></textarea>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Мэдээ</td>
                <td></td>
                <td>
                    <textarea name="info"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php if(isset($product[0]->info)){echo $product[0]->info;}?></textarea>
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
            <tr class='tablebody'>
                <td align="right" valign="top">Өнгө</td>
                <td></td>
                <td>
                    <input type="color" name="bgcolor"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Хадгалах
                    </button>
                    <a href="<?=base_url("apanel/product");?>">
                        <button type="button"
                            class="text-black hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Болих
                        </button>
                    </a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="productid" id="productid"
            value="<?php if(isset($product[0]->id)) {echo $product[0]->id; };?>" />
        <input type="hidden" name="productpicurl" id="productpicurl"
            value="<?php if(isset($product[0]->picurl)) {echo $product[0]->picurl; };?>" />
        <input type="hidden" name="productsmallpicurl" id="productsmallpicurl"
            value="<?php if(isset($product[0]->small_picurl)) {echo $product[0]->small_picurl; };?>" />
        </form>
    </div>
</div>

<script type="text/javascript">
function picclear() {
    document.getElementById("productpicurl").value = "";
    document.getElementById("productsmallpicurl").value = "";
}
</script>
</body>

</html>
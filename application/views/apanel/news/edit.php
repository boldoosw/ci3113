<title>Мэдээ</title>
<script src="<?=base_url('ckeditor/ckeditor.js');?>" type="text/javascript"></script>
<div class="container" class="pt-5 ml-72 mt-20 w-full">
    <div id="body">
        <?php  echo form_open_multipart(base_url("apanel/news/save")); ?>
        <table cellpadding="5" border="0" class="table-border-none">
            <tr class='tablebody'>
                <td align="right">Нүүрний зураг</td>
                <td></td>
                <td>
                    <div class="flex justify-items-center items-baseline">
                        <input type="file" name="newspic" id="newspic"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <button type="button" onclick="picclear()"
                            class="text-black bg-gray-300 w-48 ml-2 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Зураг
                            арилгах
                        </button>
                    </div>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right">Гарчиг</td>
                <td></td>
                <td><input type="text" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($news[0]->title)) {echo $news[0]->title; };?>"></td>
            </tr>
            <tr class='tablebody'>
                <td align="right">Меню</td>
                <td></td>
                <td>
                    <select name="menuid"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php 
							for($i=0;$i<count($menulist);$i++)
							{
							if($menulist[$i]->parentid==0){	?>
                        <option value="<?=$menulist[$i]->id;?>"
                            <?php if(isset($news[0]->menuid)) {if($news[0]->menuid==$menulist[$i]->id) {echo "selected";}} ?>>
                            <?=$menulist[$i]->menuname;?></option>
                        <?php 
								for($j=0;$j<count($menulist);$j++)
								{
									if($menulist[$i]->id==$menulist[$j]->parentid)
									{?>
                        <option value="<?=$menulist[$j]->id;?>"
                            <?php if(isset($news[0]->menuid)) {if($news[0]->menuid==$menulist[$j]->id) {echo "selected";}} ?>>
                            &nbsp;&nbsp;&nbsp;- <?=$menulist[$j]->menuname;?></option>
                        <?php
									for($k=0;$k<count($menulist);$k++)
									{
										if($menulist[$j]->id==$menulist[$k]->parentid)
										{?>
                        <option value="<?=$menulist[$k]->id;?>"
                            <?php if(isset($news[0]->menuid)) {if($news[0]->menuid==$menulist[$k]->id) {echo "selected";}} ?>>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<?=$menulist[$k]->menuname;?></option>
                        <?php
										}
									}
									}
								}
							}
						}
						?>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Товч мэдээ</td>
                <td></td>
                <td>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="description"><?php if(isset($news[0]->description)){echo $news[0]->description;}?></textarea>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Мэдээ</td>
                <td></td>
                <td>
                    <textarea name="info"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php if(isset($news[0]->info)){echo $news[0]->info;}?></textarea>
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
                <td align="right" valign="top">Онцлох</td>
                <td></td>
                <td>
                    <select name="highlight" id="highlight"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0"
                            <?php if(isset($news[0]->highlight)) { if($news[0]->highlight==0) {echo "selected";}} ?>>
                            Үгүй
                        </option>
                        <option value="1"
                            <?php if(isset($news[0]->highlight)) { if($news[0]->highlight==1) {echo "selected";}} ?>>
                            Онцлох</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Хадгалах
                    </button>
                    <a href="<?=base_url("apanel/news");?>">
                        <button type="button"
                            class="text-black hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Болих
                        </button>
                    </a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="newsid" value="<?php if(isset($news[0]->id)) {echo $news[0]->id; };?>">
        <input type="hidden" name="newspicurl" id="newspicurl"
            value="<?php if(isset($news[0]->picurl)) {echo $news[0]->picurl; };?>" />
        <input type="hidden" name="newssmallpicurl" id="newssmallpicurl"
            value="<?php if(isset($news[0]->small_picurl)) {echo $news[0]->small_picurl; };?>" />
        </form>
    </div>
</div>

<script type="text/javascript">
function picclear() {
    document.getElementById("newspicurl").value = "";
    document.getElementById("newssmallpicurl").value = "";
}
</script>
</body>

</html>
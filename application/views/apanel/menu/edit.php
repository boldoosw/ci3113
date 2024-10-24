<title>Меню</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open_multipart(base_url("apanel/menu/save")); ?>
        <table cellpadding="5" border="0" align="left" class="table-border-none" class="text-center mx-auto">
            <tr class='tablebody'>
                <td>Зураг</td>
                <td></td>
                <td>
                    <div class="flex justify-items-center items-baseline">
                        <input type="file" name="menupic" id="menupic"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <button type="button" onclick="picclear()"
                            class="text-black bg-gray-300 w-48 ml-2 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Зураг
                            арилгах
                        </button>
                    </div>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Меню нэр</td>
                <td></td>
                <td>
                    <input type="text" name="menuname"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($menu[0]->menuname)) {echo $menu[0]->menuname; };?>">
                </td>
            </tr>
            <tr class='tablebody'>
                <td valign="top">Тайлбар</td>
                <td></td>
                <td>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="menudesc"><?php if(isset($menu[0]->menudesc)){echo $menu[0]->menudesc;}?></textarea>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Меню байрлал</td>
                <td></td>
                <td>
                    <select name="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1"
                            <?php if(isset($menu[0]->location)) {if($menu[0]->location==1) {echo "selected";}} ?>>Дээд
                            тал
                        </option>
                        <option value="2"
                            <?php if(isset($menu[0]->location)) {if($menu[0]->location==2) {echo "selected";}} ?>>Хажуу
                            тал</option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Дэд цэс бол сонго</td>
                <td></td>
                <td>
                    <select name="parentid"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0"
                            <?php if(isset($menu[0]->parentid)) {if($menu[0]->parentid==0) {echo "selected";}} ?>>Дэд
                            цэс биш</option>
                        <?php 
							for($i=0;$i<count($menulist);$i++)
							{
							if($menulist[$i]->parentid==0){	?>
                        <option value="<?=$menulist[$i]->id;?>"
                            <?php if(isset($menu[0]->parentid)) {if($menu[0]->parentid==$menulist[$i]->id) {echo "selected";}} ?>>
                            <?=$menulist[$i]->menuname;?></option>
                        <?php 
								for($j=0;$j<count($menulist);$j++)
								{
									if($menulist[$i]->id==$menulist[$j]->parentid)
									{?>
                        <option value="<?=$menulist[$j]->id;?>"
                            <?php if(isset($menu[0]->parentid)) {if($menu[0]->parentid==$menulist[$j]->id) {echo "selected";}} ?>>
                            &nbsp;&nbsp;&nbsp;- <?=$menulist[$j]->menuname;?></option>
                        <?php
									for($k=0;$k<count($menulist);$k++)
									{
										if($menulist[$j]->id==$menulist[$k]->parentid)
										{?>
                        <option value="<?=$menulist[$k]->id;?>"
                            <?php if(isset($menu[0]->parentid)) {if($menu[0]->parentid==$menulist[$k]->id) {echo "selected";}} ?>>
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
                <td>Харуулах эсэх</td>
                <td></td>
                <td>
                    <select name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1"
                            <?php if(isset($menu[0]->status)) {if($menu[0]->status==1) {echo "selected";}} ?>>Харуулах
                        </option>
                        <option value="0"
                            <?php if(isset($menu[0]->status)) {if($menu[0]->status==0) {echo "selected";}} ?>>Нуух
                        </option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td>Шууд холбох бол</td>
                <td></td>
                <td><input type="text" name="link"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($menu[0]->link)) {echo $menu[0]->link; };?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Хадгалах
                    </button>
                    <a href="<?=base_url("apanel/menu");?>">
                        <button type="button"
                            class="text-black hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Болих
                        </button>
                    </a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="menuid" value="<?php if(isset($menu[0]->id)) {echo $menu[0]->id; };?>">
        <input type="hidden" name="menupicurl" value="<?php if(isset($menu[0]->picurl)) {echo $menu[0]->picurl; };?>" />
        <input type="hidden" name="menusmallpicurl"
            value="<?php if(isset($menu[0]->small_picurl)) {echo $menu[0]->small_picurl; };?>" />
        </form>
    </div>
</div>
</body>

<script type="text/javascript">
function picclear() {
    document.getElementById("menupicurl").value = "";
    document.getElementById("menusmallpicurl").value = "";
}
</script>

</html>
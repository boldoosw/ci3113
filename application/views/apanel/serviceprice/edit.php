<title>serviceprice</title>
<script src="<?=base_url('ckeditor/ckeditor.js');?>" type="text/javascript"></script>
<div class="container mt-5">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php  echo form_open_multipart(base_url("apanel/serviceprice/save")); ?>
        <table cellpadding="5" border="0" class="table-border-none">
            <tr class='tablebody'>
                <td align="right">Гарчиг</td>
                <td></td>
                <td><input type="text" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php if(isset($serviceprice[0]->title)) {echo $serviceprice[0]->title; };?>"></td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Товч мэдээ</td>
                <td></td>
                <td>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="description"><?php if(isset($serviceprice[0]->description)){echo $serviceprice[0]->description;}?></textarea>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Багц 1</td>
                <td></td>
                <td>
                    <select name="package1" id="package1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=0>Үгүй</option>
                        <option value=1
                            <?php if(isset($serviceprice[0]->package1)) { if($serviceprice[0]->package1==1) {echo "selected";}} ?>>
                            Тийм</option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Багц 2</td>
                <td></td>
                <td>
                    <select name="package2" id="package2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=0>Үгүй</option>
                        <option value=1
                            <?php if(isset($serviceprice[0]->package2)) { if($serviceprice[0]->package2==1) {echo "selected";}} ?>>
                            Тийм</option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Багц 3</td>
                <td></td>
                <td>
                    <select name="package3" id="package3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=0>Үгүй</option>
                        <option value=1
                            <?php if(isset($serviceprice[0]->package3)) { if($serviceprice[0]->package3==1) {echo "selected";}} ?>>
                            Тийм</option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Багц 4</td>
                <td></td>
                <td>
                    <select name="package4" id="package4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=0>Үгүй</option>
                        <option value=1
                            <?php if(isset($serviceprice[0]->package4)) { if($serviceprice[0]->package4==1) {echo "selected";}} ?>>
                            Тийм</option>
                    </select>
                </td>
            </tr>
            <tr class='tablebody'>
                <td align="right" valign="top">Багц 5</td>
                <td></td>
                <td>
                    <select name="package5" id="package5"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=0>Үгүй</option>
                        <option value=1
                            <?php if(isset($serviceprice[0]->package5)) { if($serviceprice[0]->package5==1) {echo "selected";}} ?>>
                            Тийм</option>
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
                    <?php 
                        $id = 0;
                        if(isset($serviceprice[0]->serviceid)) {$id=$serviceprice[0]->serviceid; } else {$id=$serviceid;}
                    ?>
                    <a href="<?=base_url("apanel/serviceprice/".$id);?>">
                        <button type="button"
                            class="text-black hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Болих
                        </button>
                    </a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="servicepriceid"
            value="<?php if(isset($serviceprice[0]->id)) {echo $serviceprice[0]->id; };?>">
        <input type="hidden" name="serviceid" value="<?=$id?>">
        </form>
    </div>
</div>

</body>

</html>
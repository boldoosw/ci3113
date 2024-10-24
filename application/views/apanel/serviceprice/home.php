<title>Мэдээ</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <a href="<?=base_url('apanel/serviceprice/add/'.$serviceid);?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>Гарчиг</td>
                <td>Тайлбар</td>
                <td width="80">Багц 1</td>
                <td width="80">Багц 2</td>
                <td width="80">Багц 3</td>
                <td width="80">Багц 4</td>
                <td width="80">Багц 5</td>
                <td width="120"></td>
            </tr>
            <?php for($i=0;$i<count($serviceprice);$i++) 
			{ ?>
            <tr class='tablebody'>
                <td><?=$serviceprice[$i]->title;?></td>
                <td><?=$serviceprice[$i]->description;?></td>
                <td><?=$serviceprice[$i]->package1;?></td>
                <td><?=$serviceprice[$i]->package2;?></td>
                <td><?=$serviceprice[$i]->package3;?></td>
                <td><?=$serviceprice[$i]->package4;?></td>
                <td><?=$serviceprice[$i]->package5;?></td>
                <td class="text-center align-middle flex justify-center">
                    <a href="<?=base_url('apanel/serviceprice/edit/'.$serviceprice[$i]->id);?>"><img
                            src="<?=base_url('images/edit.png');?>" height="30" alt="Засах"></a>
                    <a onclick="return confirm('Устгах уу!!!')"
                        href="<?=base_url('apanel/serviceprice/del/'.$serviceprice[$i]->id.'/'.$serviceid);?>"><img
                            src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах"></a>
                </td>
            </tr>
            <?php }
			?>
        </table>
        <a href="<?=base_url('apanel/serviceprice/add/'.$serviceid);?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
    </div>
</div>
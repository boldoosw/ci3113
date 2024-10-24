<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <a href="<?=base_url('apanel/slider/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>Гарчиг</td>
                <td>Тайлбар</td>
                <td>Зураг</td>
                <td></td>
            </tr>
            <?php for($i=0;$i<count($slider);$i++) 
			{ ?>
            <tr class='tablebody'>
                <td><?=$slider[$i]->title;?></td>
                <td><?=$slider[$i]->info;?></td>
                <td><img src="<?=base_url($slider[$i]->small_picurl);?>" height="30" style="height:30px!important;">
                </td>
                <td class="text-center">
                    <div class="flex justify-center text-center>
                        <a href=" <?=base_url('apanel/slider/edit/'.$slider[$i]->id);?>">
                        <img src="<?=base_url('images/edit.png');?>" height="30" alt="Засах"></a>
                        <a onclick="return confirm('Устгах уу!!!')"
                            href="<?=base_url('apanel/slider/del/'.$slider[$i]->id);?>">
                            <img src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах"></a>
                    </div>
                </td>
            </tr>
            <?php }	?>
        </table>
        <a href="<?=base_url('apanel/slider/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
    </div>
</div>
</body>

</html>
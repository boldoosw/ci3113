<title>Мэдээ</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <a href="<?=base_url('apanel/category/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>Зураг</td>
                <td>Гарчиг</td>
                <td>Тайлбар</td>
                <td width="80">Огноо</td>
                <td width="120">Үйлдэл</td>
            </tr>
            <?php for($i=0;$i<count($category);$i++) 
			{ ?>
            <tr class='tablebody'>
                <td align="center" class="align-middle w-24">
                    <img src="<?=base_url($category[$i]->small_picurl);?>" height=30 style="height:30px!important;">
                </td>
                <td><?=$category[$i]->title;?></td>
                <td><?=$category[$i]->info;?></td>
                <td><?=date_format(date_create($category[$i]->created_at),"Y-m-d");?></td>
                <td class="text-center">
                    <div class="align-middle flex justify-center">
                        <a href="<?=base_url('apanel/category/edit/'.$category[$i]->id);?>">
                            <img src="<?=base_url('images/edit.png');?>" height="30" alt="Засах"></a>
                        <a onclick="return confirm('Устгах уу!!!')"
                            href="<?=base_url('apanel/category/del/'.$category[$i]->id);?>">
                            <img src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах"></a>
                    </div>
                </td>
            </tr>
            <?php }
			?>
        </table>
        <div>
            <?php 
			if($categorycount/20>1)
			{ 
				$total_pages = ceil($categorycount/20);
				for ($i=1; $i<=$total_pages; $i++) { 
					echo "<a href='".base_url("apanel/category/page/".$i)."'>".$i."</a> "; }
			}
			?>
        </div>
        <a href="<?=base_url('apanel/category/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
    </div>
</div>
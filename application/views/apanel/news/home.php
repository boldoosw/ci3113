<title>Мэдээ</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <?php echo form_open(base_url("apanel/news/search")); ?>
        Мэдээний төрлөөр хайх
        <select name="searchmenuid" class="searchbox">
            <option value="0">Бүгд</option>
            <?php 
				for($i=0;$i<count($menulist);$i++)
				{
					if($menulist[$i]->parentid==0)
					{	?>
            <option value="<?=$menulist[$i]->IDs;?>"
                <?php if(isset($menuid)) {if($menuid==$menulist[$i]->IDs) {echo "selected";}} ?>>
                <?=$menulist[$i]->menuname;?></option>
            <?php 
						for($j=0;$j<count($menulist);$j++)
						{
							if($menulist[$i]->IDs==$menulist[$j]->parentid)
							{?>
            <option value="<?=$menulist[$j]->IDs;?>"
                <?php if(isset($menuid)) {if($menuid==$menulist[$j]->IDs) {echo "selected";}} ?>>&nbsp;&nbsp;&nbsp;-
                <?=$menulist[$j]->menuname;?></option>
            <?php
								for($k=0;$k<count($menulist);$k++)
								{
									if($menulist[$j]->IDs==$menulist[$k]->parentid)
									{?>
            <option value="<?=$menulist[$k]->IDs;?>"
                <?php if(isset($menuid)) {if($menuid==$menulist[$k]->IDs) {echo "selected";}} ?>>
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
        <button type="submit"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Хайх</button>
        </form>
        <a href="<?=base_url('apanel/news/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>Зураг</td>
                <td>Гарчиг</td>
                <td>Меню нэр</td>
                <td width="80">Огноо</td>
                <td width="120"></td>
            </tr>
            <?php for($i=0;$i<count($news);$i++) 
			{ ?>
            <tr class='tablebody'>
                <td align="center" class="align-middle"><img src="<?=base_url($news[$i]->small_picurl);?>" height=30
                        style="height:30px!important;">
                </td>
                <td><?=$news[$i]->title;?></td>
                <td><?=$news[$i]->menuname;?></td>
                <td><?=date_format(date_create($news[$i]->created_at),"Y-m-d");?></td>
                <td class="text-center align-middle flex justify-center">
                    <a href="<?=base_url('apanel/news/edit/'.$news[$i]->id);?>"><img
                            src="<?=base_url('images/edit.png');?>" height="30" alt="Засах"></a>
                    <a onclick="return confirm('Устгах уу!!!')"
                        href="<?=base_url('apanel/news/del/'.$news[$i]->id);?>"><img
                            src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах"></a>
                </td>
            </tr>
            <?php }
			?>
        </table>
        <div>
            <?php 
			if($newscount/20>1)
			{ 
				$total_pages = ceil($newscount/20);
				for ($i=1; $i<=$total_pages; $i++) { 
					echo "<a href='".base_url("apanel/news/page/".$i)."'>".$i."</a> "; }
			}
			?>
        </div>
        <a href="<?=base_url('apanel/news/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
    </div>
</div>
<title>Меню</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <a href="<?=base_url('apanel/menu/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>Pic</td>
                <td>Меню нэр</td>
                <td>Меню тайлбар</td>
                <td>Меню төрөл</td>
                <td>Меню линк</td>
                <td>Байршил</td>
                <td>Үйлдэл</td>
            </tr>
            <?php for($i=0;$i<count($menu);$i++) 
			{ 
				if($menu[$i]->parentid==0) 
				{
				?>
            <tr class='tablebody'>
                <td align="center" class="align-middle">
                    <img src="<?=base_url($menu[$i]->small_picurl);?>" height=30 style="height:30px!important;">
                </td>
                <td><?=$menu[$i]->menuname;?></td>
                <td><?=$menu[$i]->menudesc;?></td>
                <td><?php if($menu[$i]->location==1) {echo "Дээд талын меню";} else {echo "Хажуу талын меню";}?></td>
                <td><?php if($menu[$i]->status==1) {echo "Харуулах";} else {echo "Нуух";}?></td>
                <td align="center">
                    <div class="flex justify-center my-auto">
                        <?php if(isset($menu[$i-1]->id) and ($menu[$i-1]->parentid==0)) {?>
                        <a href="<?=base_url('apanel/menu/sort/'.$menu[$i]->id.'/'.$menu[$i-1]->id);?>"><img
                                src="<?=base_url("images/up.png");?>" height="15">
                        </a>
                        <?php } ?>
                        <?php if(isset($menu[$i+1]->id) and ($menu[$i+1]->parentid==0)) {?>
                        <a href="<?=base_url('apanel/menu/sort/'.$menu[$i]->id.'/'.$menu[$i+1]->id);?>"><img
                                src="<?=base_url("images/down.png");?>" height="15"></a>
                        <?php }  ?>
                    </div>
                </td>
                <td class="text-center">
                    <div class="flex justify-center my-auto">
                        <a href=" <?=base_url('apanel/menu/edit/'.$menu[$i]->id);?>">
                            <img src="<?=base_url('images/edit.png');?>" height="30" alt="Засах">
                        </a>
                        <a onclick="return confirm('Устгах уу!!!')"
                            href="<?=base_url('apanel/menu/del/'.$menu[$i]->id);?>">
                            <img src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах">
                        </a>
                    </div>
                </td>
            </tr>
            <?php 	$k=-1;
					for($j=0;$j<count($menu1);$j++)
					{
						if($menu[$i]->id==$menu1[$j]->parentid)
						{  ?>
            <tr class='tablebody'>
                <td align="center" class="align-middle">
                    <img src="<?=base_url($menu1[$i]->small_picurl);?>" height=30 style="height:30px!important;">
                </td>
                <td class="pl-5"> - <?=$menu1[$j]->menuname;?></td>
                <td><?=$menu1[$i]->menudesc;?></td>
                <td></td>
                <td><?php if($menu1[$j]->status==1) {echo "Харуулах";} else {echo "Нуух";}?></td>
                <td align="center">
                    <div class="flex justify-center my-auto">
                        <?php if(isset($menu1[$j-1]->id) and ($menu1[$j-1]->parentid==$menu[$i]->id)) {?>
                        <a href="<?=base_url('apanel/menu/sort/'.$menu1[$j]->id.'/'.$menu1[$j-1]->id);?>"><img
                                src="<?=base_url("images/up.png");?>" height="15"></a>
                        <?php } 
									else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
                        <?php if(isset($menu1[$j+1]->id) and ($menu1[$j+1]->parentid==$menu[$i]->id)) {?>
                        <a href="<?=base_url('apanel/menu/sort/'.$menu1[$j]->id.'/'.$menu1[$j+1]->id);?>"><img
                                src="<?=base_url("images/down.png");?>" height="15"></a>
                        <?php }  ?>
                    </div>
                </td>
                <td class="text-center">
                    <div class="flex justify-center my-auto">
                        <a href="<?=base_url('apanel/menu/edit/'.$menu1[$j]->id);?>">
                            <img src="<?=base_url('images/edit.png');?>" height="30" alt="Засах">
                        </a>
                        <a onclick="return confirm('Устгах уу!!!')"
                            href="<?=base_url('apanel/menu/del/'.$menu1[$j]->id);?>">
                            <img src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах">
                        </a>
                    </div>
                </td>
            </tr>
            <?php
						$k=$j;
						for($l=0;$l<count($menu2);$l++)
						{
							if($menu1[$j]->id==$menu2[$l]->parentid)
							{?>
            <tr class='tablebody'>
                <td align="center" class="align-middle">
                    <img src="<?=base_url($menu2[$i]->small_picurl);?>" height=30 style="height:30px!important;">
                </td>
                <td class="pl-10">- <?=$menu2[$l]->menuname;?></td>
                <td><?=$menu2[$i]->menudesc;?></td>
                <td></td>
                <td><?php if($menu2[$l]->status==1) {echo "Харуулах";} else {echo "Нуух";}?></td>
                <td align="center">
                    <div class="flex justify-center my-auto">
                        <?php if(isset($menu2[$l-1]->id) and ($menu2[$l-1]->parentid==$menu2[$l]->parentid)) {?>
                        <a href="<?=base_url('apanel/menu/sort/'.$menu2[$l]->id.'/'.$menu2[$l-1]->id);?>"><img
                                src="<?=base_url("images/up.png");?>" height="15" s></a>
                        <?php }  ?>
                        <?php if(isset($menu2[$l+1]->id) and ($menu2[$l+1]->parentid==$menu1[$j]->id)) {?>
                        <a href="<?=base_url('apanel/menu/sort/'.$menu2[$l]->id.'/'.$menu2[$l+1]->id);?>"><img
                                src="<?=base_url("images/down.png");?>" height="15"></a>
                        <?php } ?>
                    </div>
                </td>
                <td class="text-center">
                    <div class="flex justify-center my-auto">
                        <a href="<?=base_url('apanel/menu/edit/'.$menu2[$l]->id);?>">
                            <img src="<?=base_url('images/edit.png');?>" height="30" alt="Засах">
                        </a>
                        <a onclick="return confirm('Устгах уу!!!')"
                            href="<?=base_url('apanel/menu/del/'.$menu2[$l]->id);?>">
                            <img src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах">
                        </a>
                    </div>
                </td>
            </tr>
            <?php
							}
						}
					}
				}
			}	
		}
?>
        </table>
        <a href="<?=base_url('apanel/menu/add');?>"><button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх</button>
        </a>
    </div>
</div>
</body>

</html>
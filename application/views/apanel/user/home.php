<title>Хэрэглэгч</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <a href="<?=base_url('apanel/user/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх</button>
        </a>
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>Хэрэглэгч</td>
                <td>Түвшин</td>
                <td></td>
            </tr>
            <?php for($i=0;$i<count($user);$i++)
			{ 
			?>
            <tr class='tablebody'>
                <td><?=$user[$i]->lastname;?></td>
                <td>
                    <!-- <?php 
					switch($user[$i]->level)
					{
						case "1": echo "Admin";break;
						case "0": echo "User";break;
					}
					?> -->
                </td>
                <td class="text-center bg-white"><a onclick="return confirm('Устгах уу!!!')"
                        href="<?=base_url('apanel/user/del/'.$user[$i]->id);?>"><img
                            src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах"></a></td>
            </tr>
            <?php }?>
        </table>
        <a href="<?=base_url('apanel/user/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
    </div>
</div>
</body>

</html>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <a href="<?=base_url('apanel/socialmedia/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>Сошиал хаяг</td>
                <td>Холбоос</td>
                <td>Үйлдэл</td>
            </tr>
            <?php for($i=0;$i<count($socialmedia);$i++) 
			{ 
				?>
            <tr class='tablebody'>
                <td><?=$socialmedia[$i]->type;?></td>
                <td><?=$socialmedia[$i]->link;?></td>
                <td class="text-center">
                    <div class="align-middle col-1 flex justify-center">
                        <a href="<?=base_url('apanel/socialmedia/edit/'.$socialmedia[$i]->id);?>">
                            <img src="<?=base_url('images/edit.png');?>" height="30" alt="Засах"></a>
                        <a onclick="return confirm('Устгах уу!!!')"
                            href="<?=base_url('apanel/socialmedia/del/'.$socialmedia[$i]->id);?>">
                            <img src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах"></a>
                        <div>

                </td>
            </tr>
            <?php }	?>
        </table>
        <a href="<?=base_url('apanel/socialmedia/add');?>">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Нэмэх
            </button>
        </a>
    </div>
</div>
</body>

</html>
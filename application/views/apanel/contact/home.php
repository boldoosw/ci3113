<title>Мэдээ</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <table cellpadding="5" width="100%" class="table">
            <tr class='tablehead'>
                <td>И-мэйл</td>
                <td>Гарчиг</td>
                <td>Коммент</td>
                <td>Уншсан</td>
                <td width="80">Огноо</td>
                <td width="120"></td>
            </tr>
            <?php for($i=0;$i<count($contact);$i++) 
			{ ?>
            <tr class='tablebody'>
                <td><?=$contact[$i]->email;?></td>
                <td><?=$contact[$i]->title;?></td>
                <td><?=$contact[$i]->message;?></td>
                <td><?php if($contact[$i]->status==1) {echo 'new';} else {echo 'Уншсан';};?></td>
                <td><?=date_format(date_create($contact[$i]->created_at),"Y-m-d");?></td>
                <td class="text-center align-middle flex justify-center">
                    <a onclick="return confirm('Устгах уу!!!')"
                        href="<?=base_url('apanel/contact/del/'.$contact[$i]->id);?>">
                        <img src="<?=base_url('images/delete.png');?>" height="30" alt="Устгах"></a>
                </td>
            </tr>
            <?php }
			?>
        </table>
    </div>
</div>
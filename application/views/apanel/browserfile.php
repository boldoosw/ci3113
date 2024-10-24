[
<?php
	for($i=0;$i<count($infopic);$i++)
	{
?>
	{
	"thumb": "<?=base_url($infopic[$i]->small_picurl);?>",
	"image": "<?=base_url($infopic[$i]->picurl);?>",
	"folder": "<?=$infopic[$i]->foldername;?>"
	},

<?php } ?>
	{
	"thumb": "",
	"image": "",
	"folder": "201808"
	}
]
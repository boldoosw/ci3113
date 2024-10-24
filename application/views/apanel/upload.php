<?php 

function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

    //$dirurl = base_url("images/news/".date("Ym"));
    //$dirsmallurl = base_url("images/news/small/".date("Ym"));
    //mkdir(base_url("../images/news/201502"), 0777);

	$url = "images/news/".time()."_".$_FILES['upload']['name'];
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
    {
       $message = "Файлаа сонго";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "Файл алдаатай байна.";
    }
    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
    {
       $message = "Та зөвхөн JPG болон PNG өрөгтгөлтэй файл оруулна уу?";
    }
    else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    }
    else {

list($width,$height)=getimagesize($_FILES['upload']['tmp_name']);
$filename = stripslashes($_FILES['upload']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if($width>600){$newwidth=600;}else {$newwidth=$width;}
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['upload']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['upload']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
imagejpeg($tmp,$url,100);
imagedestroy($tmp);

$smallpicurl = "images/news/small/".time()."_".$_FILES['upload']['name'];

list($width,$height)=getimagesize($_FILES['upload']['tmp_name']);
$filename = stripslashes($_FILES['upload']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
$newwidth=150;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['upload']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['upload']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
imagejpeg($tmp,$smallpicurl,100);
imagedestroy($tmp);
	  
	  $message = "";
	  
	  $record = array('picurl'=>$url, 'small_picurl'=>$smallpicurl, 'foldername'=>date("Ym"));
	  $this->db->insert('allpic', $record);

//$this->load->helper('file');
//write_file(base_url('images_list.html'), 'test', 'w');

	  $url = base_url($url);
    }
$funcNum = $_GET['CKEditorFuncNum'] ;
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
?>
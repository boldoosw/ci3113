<meta charset="utf-8">
<title>Файл</title>
<?php 
    $url = 'pdf/'.time()."_".$_FILES['pdffile']['name'];
    if (($_FILES['pdffile'] == "none") OR (empty($_FILES['pdffile']['name'])) )
    {
       $message = "Файлаа сонго";
    }
    else if ($_FILES['pdffile']["size"] == 0)
    {
       $message = "Файл алдаатай байна.";
    }
    else if (!is_uploaded_file($_FILES['pdffile']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    }
    else {
      $message = "";
      $move = @ move_uploaded_file($_FILES['pdffile']['tmp_name'], $url);
      if(!$move)
      {
         $message = "Файл хуулах явцад алдаа гарлаа. Та фолдерийн хандах эрхийг шалгана уу?";
      }
      else {
        echo "<div>Таны хуулсан файлын зам:</div>";
        echo "<textarea rows='5' id='txtarea' onclick='SelectAll()' onfocus='SelectAll()' style='width:90%'>";
        echo "<iframe src='".base_url($url)."' height='600px' width='100%' frameborder='0' /></textarea>";
        //echo "<embed width='100%' height='100%' name='plugin' src='".base_url($url)."' type='application/pdf' />";
        echo "</textarea>";
      }
    }

?>

<script type="text/javascript">
function SelectAll()
{
    document.getElementById("txtarea").focus();
    document.getElementById("txtarea").select();
}
</script>
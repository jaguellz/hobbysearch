<meta charset="utf-8">
<?php
if(isset($_FILES)&&!$_FILES["123"]["error"]){
    $destination=dirname(__FILE__).'/images/'.$_FILES['123']["name"];
    move_uploaded_file ($_FILES['123']['tmp_name'], $destination);
    echo "загружено";
}
else {
    echo 'не загружено';
}
?>
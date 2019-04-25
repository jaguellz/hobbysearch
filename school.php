<?php
require_once("support/connect.php");
require_once('support/head.php');
$sql="SELECT name,img,place,description,contacts FROM school WHERE id=".$_GET['id'];
$result=$mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $name=$row['name'];
    $descr=$row['description'];
    $place=$row['place'];
    $img=$row['img'];
    $contacts=$row['contacts'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="school.css"/>
    <?=$head?>
</head>
<body>
    <header>
        <a id="main-title" href='index.php'>хочу учиться!</a>
        <?=$header?>
    </header>
<main>
    <div class="title">
       <?=$name?>
    </div>
    <div class="pic">
    <img src="<?=$img?>" style='width:200px; height:200px;'>
    </div>
    
    <div class="location">
        <?=$place?>
    </div>
    <div class="about">
        <strong style='font-size: 40px;'>O заведении:</strong><br>
        <?=$descr?>
    </div>
    <div class="contacts">
        <strong >Контакты:</strong> <br>
        <?=$contacts?>
    </div>
</main>
<footer>
    <?=$footer?>
</footer>
</body>
</html>
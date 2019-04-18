<?php
require_once("connect.php");
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>wanttostudy</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="school.css"/>
    <script src="style.js"></script>
</head>
<body>
    <header>
        <div id="main-title">хочу учиться!</div>
            <div class="main-url">
            <div>главная контакты о нас</div>
        </div>
    </header>
<main>
    <div class="title">
       <?=$name?>
    </div>
    <div class="pic" style='background-image:url(<?=$img?>)'>
    </div>
    <div class="newsbox">
    <?$sql='SELECT news,title FROM `news` WHERE id_school='.$_GET['id'];
        $result=$mysqli->query($sql);
        while($row = $result->fetch_assoc()) {
            ?>
            <div class='news'>
                <h1><?=$row['title']?></h1>
                <?=$row['news']?>
            </div>
        <?}}?>
    </div>
    <div class="location">
        <?=$place?>
    </div>
    <div class="about">
        <strong>O заведении:</strong><br>
        <?=$descr?>
    </div>
    <div class="contacts">
        <strong>контакты:</strong> <br>
        <?=$contacts?>
    </div>
    <div class="partners">
        <strong>партнёры:</strong>
    </div>
</main>
</body>
</html>
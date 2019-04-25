<?php
require_once("connect.php");
require_once('head.php');
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
        <link rel="icon" href="https://www.flaticon.com/premium-icon/icons/svg/613/613307.svg">
    <script src="style.js"></script>
</head>
<body>
    <header>
        <a id="main-title" href='index.php'>хочу учиться!</a>
        <?=$head?>
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
    footer
</footer>
</body>
</html>
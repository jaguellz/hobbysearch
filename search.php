<?php
$width='100px';
require_once("connect.php");
$hobby=$_GET['hobby'];
$town=$_GET['town'];
$sql='SELECT id_school FROM `connect` WHERE id_hobby='.$hobby;
$result=$mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $schoolsWhobby[]=$row['id_school'];
}
$sql='SELECT id,name,place,rating,img FROM `school` WHERE town='.$town;
$result=$mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    foreach ($schoolsWhobby as $key => $value) {
        if ($value==$row['id']) $schools[]=$value;   
    }
};
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>wanttostudy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="search.css"/>
    <script src="style.js"></script>
</head>
<body>
    <header>
        <div>
            <a id="main-title" href=''>хочу учиться!</a>
            <div class="main-url">
                <div>главная контакты о нас</div>
            </div>
        </div>
        <div id=filters>
            <form method="get">
            <select name="town" class='sel'>
            <?
            $result=$mysqli->query("SELECT id,name from town");
            while($row = $result->fetch_assoc()) {
                echo "<option value=".$row['id'].">".$row['name']."</option>";
            }
            ?>
            </select>
            <select class='sel' name='hobby'>
            <?
            $result=$mysqli->query("SELECT id,name from hobby");
            while($row = $result->fetch_assoc()) {
                echo "<option value=".$row['id'].">".$row['name']."</option>";
            }
            ?>
            </select>
            <input type="submit" value="поиск">
            </form>
        </div>
    </header>
    <main>
        <div id=all>
        <?foreach ($schools as $key => $value) {
        $sql='SELECT id,name,place,rating,img FROM `school` WHERE id='.$value;
        $result=$mysqli->query($sql);
        while($row = $result->fetch_assoc()) { $url="school.php?id=".$row['id'];
            ?>
            <a href=<?=$url?> class='a'>
                <div class='school'>
                    <div>
                        <div class='about pic'><img src="<?=$row['img']?>" width=<?=$width?> height=<?=$width?>></div>
                        <div class='about'><?=$row['name']?></div>
                    </div>
                    <div class='about'><?=$row['place']?></div>
                    <div class='about descr'><?=$row['rating']?>/10</div>
                </div>
            </a>
        <?}}?>
        </div>
    </main>
    <footer>
        12312321421423423
    </footer>
</body>
</html>
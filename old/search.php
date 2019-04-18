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

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>wanttostudy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pain.css"/>
    <script src="style.js"></script>
</head>
<body>
    <header>
        <div>
            <div id="main-title">хочу учиться!</div>
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
        <?foreach ($schoolsWhobby as $key => $value) {
        $sql='SELECT name,place,rating,img FROM `school` WHERE id='.$value;
        $result=$mysqli->query($sql);
        while($row = $result->fetch_assoc()) {
            ?>
                <div class='school'>
                    <div>
                        <div class='about pic'><img src="<?=$row['img']?>" width=<?=$width?> height=<?=$width?>></div>
                        <div class='about'><?=$row['name']?></div>
                    </div>
                    <div class='about'><?=$row['place']?></div>
                    <div class='about descr'><?=$row['rating']?></div>
                </div>
        <?}}?>
        </div>
    </main>
    <footer>
        12312321421423423
    </footer>
</body>
</html>
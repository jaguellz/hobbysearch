<?php
header('Content-type:text/html;charset=utf-8');
require_once("connect.php");
if ($_POST['accept']) {
    $town=$_POST['town'];
    $hobby=$_POST['hobby'];
    $sql="SELECT id_school FROM connect WHERE id_hobby=".$hobby;
    $result=$mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        $schools[] = $row['id_school'];
    }
    foreach ($schools as $key => $value) {
        $sql="SELECT town FROM school WHERE id=".$value;
        $result=$mysqli->query($sql);
        while($row = $result->fetch_assoc()) {
            if ($town==$row['town']) {
            $schoolf[]=$value;
            }
        }
    }
    foreach ($schoolf as $key => $value) {
        $sql="SELECT name FROM school WHERE id=".$value;
        $result=$mysqli->query($sql);
        while($row = $result->fetch_assoc()) {
            echo $row['name'];
        }
    }
}
?>
<head>
    <style>
        form{text-align:center;color:white;margin-top:35vh;} *{background:black;color:white; margin:0.15vh;} 
    </style>
</head>
<form method="post">
    <select name="town">
        <?
        $result=$mysqli->query("SELECT id,name from town");
        while($row = $result->fetch_assoc()) {
            $zap = "<option value=".$row['id'].">".$row['name']."</option>";
            echo $zap;
        }
        ?>
    </select>
    <select name="hobby">
        <?
        $result=$mysqli->query("SELECT id,name from hobby");
        while($row = $result->fetch_assoc()) {
            $zap = "<option value=".$row['id'].">".$row['name']."</option>";
            echo $zap;
        }
        ?>
    </select>
    <input type="submit" value="Поиск" name='accept'>
</form>
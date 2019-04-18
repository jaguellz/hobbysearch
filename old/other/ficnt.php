<?php
header('Content-type:text/html;charset=utf-8');
require_once("connect.php");
$hobbies=explode(', ',$_POST['hobby']);
$names=explode(', ',$_POST['name']);
foreach ($names as $key => $value) {
    $sql= 'INSERT INTO connect (id_school,id_hobby) VALUES (\''.$value.'\','.$hobbies[$key].')';
    $result=$mysqli->query($sql);
    echo $sql.'<br>';
}
?>


<form method="post">
    school:<textarea name="name" cols="30" rows="10"></textarea> <br>
    hobby:<textarea name="hobby" cols="30" rows="10"></textarea> <br>
    </select> <br>
    <input type="submit">
</form>
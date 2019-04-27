<?php
require_once('support/head.php');
$con=mysqli_connect("localhost","root","","project");
$results[0]=$con->query("SELECT id,name from hobby");
$results[1]=$con->query("SELECT id,name from town");
$i=0;
$options;
mysqli_close($con);
while($row = $results[0]->fetch_assoc()) {
    $options[0]=$options[0].'<li><input type="checkbox" name="hobby[]" value='.$row['id'].'>'.$row['name'].'</li>';
}

while($row = $results[1]->fetch_assoc()) {
    $options[1]=$options[1]."<option value=".$row['id'].">".$row['name']."</option>";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?=$head?>
    <link rel="stylesheet" href="addschool.css">
    <style>*{font-family: 'clear sans'; font-size:20px;}</style>
</head>
<body>
    <header>
        <a id="main-title" href='index.php'>хочу учиться!</a>
        <?=$header?>
    </header>
    <main>
        <form action="" method='post'>
            Как называется: <input type="text" name='name'> <br>
            Где находится: город:<select name="town"><?=$options[1]?></select>
            адрес:<input type="text" name=place> <br>
            Чем занимается:<ul><?=$options[0]?></ul>
            Описание: <textarea name="descr" cols="30" rows="10"></textarea> <br>
            <input type="submit" value="отправить">
        </form>
        <?var_dump($_POST['hobby']); var_dump($_POST['1'])?>
    </main>
</body>
</html>
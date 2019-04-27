<?php
require_once('support/head.php');
$con=mysqli_connect("localhost","root","","project");
$results[0]=$con->query("SELECT id,name from hobby");
$results[1]=$con->query("SELECT id,name from town");
$i=0;
$options;
mysqli_close($con);
while($row = $results[0]->fetch_assoc()) {
    $options[0]=$options[0].'<input type="checkbox" name="hobby[]" value='.$row['id'].'>'.$row['name'].' ';
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
    <style></style>
</head>
<body>
    <header>
        <a id="main-title" href='index.php'>хочу учиться!</a>
        <?=$header?>
    </header>
    <main>
        <h1 style='text-align:center'>Добавить Ваше учреждение</h1>
        <form method='post' >
            <table>
                <tr><td>Как называется:</td><td><input type="text" name='name'></td></tr>
                <tr><td>Город:</td><td><select name="town"><?=$options[1]?></select></td></tr>
                <tr><td>Адрес:</td><td><input type="text" name=place></td></tr>
                <tr><td>Чем занимается:</td><td><?=$options[0]?><td></tr>
                <tr><td>Картинка(ссылкой):</td><td><input type="url" name="img"></td></tr>
                <tr><td>Описание:</td><td><textarea name="description" cols="30" rows="10"></textarea></td></tr>
                <tr><td>Контакты:</td><td><input type='text' name="contacts" value="+7"></td></tr>
                <tr><td></td><td><input type="submit" value="Отправить"></td></tr>
            </table>    
        </form>
    </main>
</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","project");
$sql="INSERT INTO school (name,place,town,img,description,contacts) VALUES ('".$_POST['name'].'\',\''.$_POST['place'].'\',\''.$_POST['town'].'\',\''.$_POST['img'].'\',\''.$_POST['description'].'\',\''.$_POST['contacts']."')";
$con->query($sql);
echo $sql.'<br>';
$sql="SELECT `id` FROM school WHERE name='".$_POST['name']."'";
$result=$con->query($sql);
echo $sql.'<br>';
while ($row=$result->fetch_assoc()) {
    $id=$row['id'];
}
foreach ($_POST['hobby'] as $key => $value) {
    $sql="INSERT INTO connect (id_school,id_hobby) VALUES (".$id.','.$value.")";
    $con->query($sql);
    echo $sql.'<br>';
}
mysqli_close($con);
?>
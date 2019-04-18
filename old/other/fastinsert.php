<?php
header('Content-type:text/html;charset=utf-8');
require_once("connect.php");
$names=explode(', ',$_POST['name']);
foreach ($names as $key => $value) {
    $sql= "INSERT INTO ".$_POST['table'].' (name,town) VALUES (\''.$value.'\','.$_POST['town'].')';
    $result=$mysqli->query($sql);
    echo $sql.'<br>';
}

?>


<form method="post">
    table: <select name="table">
        <option value="town">town</option>
        <option value="hobby">hobby</option>
        <option value="school">school</option>
    </select> <br>
    name:<textarea name="name" cols="30" rows="10"></textarea> <br>
    <select name="town">
        <?
        $result=$mysqli->query("SELECT id,name from town");
        while($row = $result->fetch_assoc()) {
            $zap = "<option value=".$row['id'].">".$row['name']."</option>";
            echo $zap;
        }
        ?>
    </select> <br>
    <input type="submit">
</form>
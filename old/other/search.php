<?php
header('Content-type:text/html;charset=utf-8');
require_once("connect.php");
$town=$_POST['town'];
$hobby=$_POST['hobby'];
/*$sql='SELECT id FROM `school` WHERE town='.$town;
$result=$mysqli->query($sql);
while($row = $result -> fetch_assoc()) {
    $id= $row['id'];
    
}*/
$sql="SELECT town,name FROM school WHERE id=".$id;
    $res=$mysqli->query($sql);
    while($row = $res->fetch_assoc()) {
        if ($town==$row['town']) {
            echo $row['name'];
        }
    }
?>

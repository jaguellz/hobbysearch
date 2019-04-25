<meta charset="utf-8">
<?php

$host="localhost";
$login="root";
$password="";
$database_name="project";

 $mysqli = new mysqli($host,$login,$password,$database_name);

 if ($mysqli->connect_error) {
     die("Ошибка доступа!".$mysqli->connect_error);
 }

 ?>
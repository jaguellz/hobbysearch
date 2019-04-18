<?php
$login='123';
$password='123';
header('Content-type:text/html;charset=utf-8');
require_once("connect.php");
if ($_POST['login']==$login && $_POST['password']==$password && $_POST['accept0']) {
    session_start();
    $_SESSION['table']=$_POST['table'];
    $_SESSION['query']=$_POST['query'];
    echo 'ok';
} 
elseif (session_status()=='PHP_SESSION_ACTIVE' && $_POST['accept0']) {
    $_SESSION['table']=$_POST['table'];
    echo 'ok2';
    $_SESSION['query']=$_POST['query'];
} 
else{
    echo 'govno';
}
?>
<head>
    <style>
        form{text-align:center;color:white;margin-top:35vh;} *{color:white;background:black; margin:0.15vh;} input{background:white; color:black;} select{background:white;color:black;} option{background:white;color:black;}
    </style>
</head>
<form method="post" >
    login:<input type="text" name="login"> <br>
    password:<input type="password" name="password"> <br>
    <select name="table">
        <?
        $result=$mysqli->query("SHOW TABLES");
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row['Tables_in_project'].">".$row['Tables_in_project']."</option>";
        }
        ?>
    </select> <br>
    <select name="query"> 
        <option value="insert">insert</option>
        <option value="delete">delete</option>
        <option value="update">update</option>
        <option value="select">select</option>
    </select> <br>
    <input type="submit" value="1" name='accept0'>
</form>
<form method="get" action='api\server.php'>
    where:<input type="text" name="where"> <br>
    fields:<input type="text" name="fields" value='name'> <br>
    values:<input type="text" name="values"> <br>
    limit:<input type="text" name="limit"> <br>
    <input type="submit">
</form>



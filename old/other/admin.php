<?php
header('Content-type:text/html;charset=utf-8');
if ($_POST['table'] && $_POST['query']) {
    $url="http://localhost/api/server.php?login=".$_POST['login']."&password=".$_POST['password']."&table=".$_POST['table']."&query=".$_POST['query'];
    switch ($_POST['query']) {
        case 'insert':
            if ($_POST['fields'] && $_POST['values']) {
                $url=$url."&fields=".$_POST['fields']."&values=".$_POST['values'];
            }
            else {
                echo "не все поля заполнены";
            }
        break;
        case 'select':
            if ($_POST['fields']) {
                $url=$url."&fields=".$_POST['fields'];
                if($_POST['where']){
                    $url = $url.' WHERE '.$_POST['where'];
                }
                if($_POST['limit']){
                    $url = $url.' LIMIT '.$_POST['limit'];
                }
            }
            else {
                echo "не все поля заполнены";
            }
        break;
        case 'delete':
            if($_POST['where']){
                    $url = $url.' WHERE '.$_POST['where'];
            }
            else {
                echo "не все поля заполнены";
            }
        break;
        case 'update':
            if ($_POST['fields'] && $_POST['values']) {
                $url=$url."&fields=".$_POST['fields']."&values=".$_POST['values'];
                if($_POST['where']){
                    $url = $url.' WHERE '.$_POST['where'];
                }
            }
            else {
                echo "не все поля заполнены";
            }
        break;
    }
    echo $url;
    echo @file_get_contents($url);
}
?>
<head>
    <style>
        form{text-align:center;color:white;margin-top:35vh;} *{background:black; margin:0.15vh;} input{background:white;} select{background:white;} option{background:white;}
    </style>
</head>
<form method="POST">
    login:<input type="text" name="login"> <br>
    password:<input type="password" name="password"> <br>
    <select name="table">
        <option value="hobby">hobby</option>
        <option value="town">Town</option>
        <option value="school">school</option>
    </select> <br>
    <select name="query"> 
        <option value="insert">insert</option>
        <option value="delete">delete</option>
        <option value="update">update</option>
        <option value="select">select</option>
    </select> <br>
    where:<input type="text" name="where"> <br>
    fields:<input type="text" name="fields" value='name'> <br>
    values:<input type="text" name="values"> <br>
    limit:<input type="text" name="limit"> <br>
    <input type="submit">
</form>
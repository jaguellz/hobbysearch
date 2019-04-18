<?php
header('Content-type:text/html;charset=utf-8');
require_once("connect.php");

if ($_POST['login']=='' && $_POST['password']=='' && $_POST['accept0'] && $_POST['query'] != "delete") {
    $sql="DESCRIBE ".$_POST['table'];
    $text='query: '.$_POST['query'].'<br> table: '.$_POST['table'].'<br> Fields:<select name="fields">';
    $result=$mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        $text=$text."<option value='".$row['Field']."'>".$row['Field']."</option>";
    }
    $text=$text."<option value='*'>all fields</option></select> <br>";
    switch ($_POST['query']) {
    case 'insert':
        $text=$text.'values:<input type="text" name="values"> <br>';
        break;
    case 'select':
        $text=$text.'where:<input type="text" name="where"> <br>';
        $text=$text.'limit:<input type="text" name="limit"> <br>';
        break;
    case 'update':
        $text=$text.'values:<input type="text" name="values"> <br>';
        $text=$text.'where:<input type="text" name="where"> <br>';
        break;
    }
    $text=$text."<input type='submit' name='accept'>";
    echo $url;
}
elseif ($_POST['login']=='' && $_POST['password'] && $_POST['query'] == "delete") {
    $text="where:<input type='text' name='where'> <br> <input type='submit' name='accept'>";    
}
else {
    $text = '<h4>неверный логин или пароль</h4>';
}
if ($_POST['accept']) {
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
                $url=$url."&fields=".$_POST['fields'];
                if($_POST['where']){
                    $url = $url.' WHERE '.$_POST['where'];
                }
                if($_POST['limit']){
                    $url = $url.' LIMIT '.$_POST['limit'];
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
<head><!----->
    <style> 
        form{text-align:center;color:white;} *{background:black; margin:0.15vh; color:white;} h4{color:red;}/* select{color:white;} option{color:white;}*/
    </style>
</head>
<form method="POST" style='margin-top:35vh;'>
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
    <input type="submit" name='accept0' value='Запросить'>
</form>
<form method="post" >
    <?
    echo $text;
    ?>
</form>
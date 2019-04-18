<?php
header('Content-type:text/html;charset=utf-8');
require_once("connect.php");
if ($_POST['login'] && $_POST['password'] && $_POST['table']) {
    if ($_POST['delete']) {
        $query='delete';
    } 
    elseif ($_POST['insert']) {
        $query='insert';
    } 
    elseif ($_POST['select']) {
        $query='select';
    }
    else {
       $query='update';
    }
    $url="http://localhost/api/server.php?login=".$_POST['login']."&password=".$_POST['password']."&table=".$_POST['table']."&query=".$query;
    switch ($query) {
        case 'insert':
            if ($_POST['fields1'] && $_POST['values1']) {
                $url=$url."&fields=".$_POST['fields1']."&values=".$_POST['values1'];
            }
            else {
                echo "не все поля заполнены";
            }
            break;
        case 'select':
            if ($_POST['fields2']) {
                $url=$url."&fields=".$_POST['fields2'];
                if($_POST['where']){
                    $url = $url.'&where='.$_POST['where2'];
                }
                if($_POST['limit']){
                    $url = $url.'&limit='.$_POST['limit2'];
                } 
            }
            else {
                echo "не все поля заполнены";
            }
            break;
        case 'delete':
            if($_POST['where0']){
                $url = $url.'&where='.$_POST['where0'];
            }
            break;
        case 'update':
            if ($_POST['fields3'] && $_POST['values3']) {
                $url=$url."&fields=".$_POST['fields3']."&values=".$_POST['values3'];
                if($_POST['where3']){
                    $url = $url.'&where='.$_POST['where3'];
                }
            }
            else {
                echo "не все поля заполнены";
            }
            break;
    }
    echo $url.'<br>';
    echo @file_get_contents($url);
}

?>
<head>
    <style> 
        form{text-align:center;color:white;} *{background:black; margin:0.15vh; color:white;} h4{color:red;}/* select{color:white;} option{color:white;}*/
    </style>
</head>
<form method="post">
    login: <input type="text" name="login"> <br>
    password: <input type="password" name="password"> <br>
    <select name="table">
        <?
        $sql='SHOW TABLES';
        $result=$mysqli->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row['Tables_in_project'].">".$row['Tables_in_project']."</option>";
        }
        ?>
    </select>
    <table border=3>
        <tr>
            <td>query</td>
            <td><input type="radio" name="delete">delete</td>
            <td><input type="radio" name="insert">insert</td>
            <td><input type="radio" name="select">select</td>
            <td><input type="radio" name="update">update</td>
        </tr>
        <tr>
            <td>fields</td>
            <td></td>
            <td><input type="text" name="fields1"></td>
            <td><input type="text" name="fields2"></td>
            <td><input type="text" name="fields3"></td>
        </tr>
        <tr>
            <td>values</td>
            <td></td>
            <td><input type="text" name="values1"></td>
            <td></td>
            <td><input type="text" name="values3"></td>
        </tr>
        <tr>
            <td>where</td>
            <td><input type="text" name='where0'></td>
            <td></td>
            <td><input type="text" name='where2'></td>
            <td><input type="text" name='where3'></td>
        </tr>
        <tr>
            <td>limit</td>
            <td></td>
            <td></td>
            <td><input type="text" name='limit2'></td>
            <td></td>
        </tr>
    </table>
    <input type="submit" value='accept'>
</form>

<?php
header('Content-type:text/html;charset=utf-8');?>
<head>
    <style>
        form{text-align:center;color:white;margin-top:35vh;} *{color:white;background:black; margin:0.15vh;} input{background:white; color:black;} select{background:white;color:black;} option{background:white;color:black;}
    </style>
</head>
<form method="get" action='api\server.php'>
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



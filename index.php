<!DOCTYPE html>
<html>
<head>
    <?require_once("connect.php");?>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Хочу учиться</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index.css"/>
    <script src="style.js"></script>
</head>
<body>
    <header>
        <div id="main-title">хочу учиться!</div>
            <div class="main-url">
            <div>главная контакты о нас</div>
        </div>
    </header>
    <main>
           
        <!-----<img src="back.jpg" style="height:400px; width:100%; float:left; z-index:4; padding-bottom:5px">--->
    <form  method='get' class="choice" action='search.php'> 
        <div id="town" class='selects'>Выберите город: <select name="town" class='sel'>
            <?
            $result=$mysqli->query("SELECT id,name from town");
            while($row = $result->fetch_assoc()) {
                echo "<option value=".$row['id'].">".$row['name']."</option>";
            }
            ?>
            </select>
        </div>
        <div id="hobby" class='selects'>Выберите хобби: <select class='sel' name='hobby'>
            <?
            $result=$mysqli->query("SELECT id,name from hobby");
            while($row = $result->fetch_assoc()) {
                echo "<option value=".$row['id'].">".$row['name']."</option>";
            }
            ?>
            </select>
        </div>
        <input type="submit" value="Искать">
    </form>
    <div class="info">
        <div id="blackinfo">
            <strong>ХОЧУ УЧИТЬСЯ</strong>-проект, призванный облегчить<br>
            процесс поиска научиться тем или иным вещах,<br>
            найти учителя или школу.</div>
        <div id="whiteinfo">
            контакты:<br>
            +7(999)654-14-13<br>
            +7(969)238-56-99
        </div> 

        </div>
    </main>
    <footer>
        VREREFEFEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEF

    </footer>
</body>
</html>
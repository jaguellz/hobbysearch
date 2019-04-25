<!DOCTYPE html>
<html>
<head>
    <?require_once("connect.php");
    require_once('head.php');?>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Хочу учиться</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index.css">
        <link rel="icon" href="https://www.flaticon.com/premium-icon/icons/svg/613/613307.svg">
</head>
<body>
    <header>
        <a id="main-title" href='index.php'>хочу учиться!</a>
        <?=$head?>
    </header>
    <main>
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
        <input type="submit" value="Искать" class='button'>
    </form>
    <div class="info">
        <div id="blackinfo">
            <strong>ХОЧУ УЧИТЬСЯ</strong>-проект, призванный облегчить<br>
            процесс поиска научиться тем или иным вещах,<br>
            найти учителя или школу.</div>
        <div id="whiteinfo">
            контакты:<br>
            <a href='https://vk.com/qzynoc'><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/VK.com-logo.svg/768px-VK.com-logo.svg.png" width="32px" height="32px"></a>
            <a href="https://www.instagram.com/qzynoc/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/1024px-Instagram_logo_2016.svg.png" width="32px" height="32px"></a>
            +7(999)647-04-27 <br>
            <a href='https://vk.com/id242226084'><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/VK.com-logo.svg/768px-VK.com-logo.svg.png" width="32px" height="32px"></a>
            <a href="https://www.instagram.com/noth.ink"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/1024px-Instagram_logo_2016.svg.png" width="32px" height="32px"></a>        
            +7(999)724-52-37 <br>
        </div> 
    </div>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>
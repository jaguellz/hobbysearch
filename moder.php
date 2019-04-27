<?php
$login='123';
$password='123';
if ($_POST['accept'] && $_POST['login']==$login && $_POST['password']==$password) {
    work();    
} elseif ($_POST['accept']) {
    login();
    echo "lox";
} else {
    login();
}
if (condition) {
    # code...
}

function login() : void{
    ?>
    <form method="post">
        login: <input type="text" name='login'> <br>
        password: <input type="password" name="password"> <br>
        <input type="submit" name="accept">
    </form>
<?}
function work() : void{
    $con=mysqli_connect("localhost","root","","project");
    $sql="SELECT * FROM school WHERE moderated='0'";
    $result=$con->query($sql);
    while ($row=$result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            echo $key.' '.$value.' ';
        }
        ?><input type="submit" value="Moderated" name=<?=$row['id']?>> <br><?;
    }
    ?>
<?}

function update($id){
    $sql="UPDATE `school` SET `moderated`='1' WHERE id='".$id."'";
}
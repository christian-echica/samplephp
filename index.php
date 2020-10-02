<?php
require_once 'vendor/autoload.php'

?>

<!DOCTYPE html>
<html>
<head>
<title>The Christian Hello World PHPUnit</title>
<link rel="stylesheet" href="css/main.css"
</head>
<body>
<img src = "images/php-logo.png" height = 100 width = 200>
<h1>This is simple Login Page that connects to MySQL DB</h1>
<h2> written by: Christian Echica </h2>
<h3> This page is deployed via CodePipeline </h3>


<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>


<?php
include "ini/config.ini";

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>

</body>
</html>
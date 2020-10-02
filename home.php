<?php
include "ini/config.ini";
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
    $x = $__SESSION['uname'];
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>Homepage</h1>
        <form method='post' action="">
            <?php echo '<h1>' . 'Welcome to AWS CodeDeploy and CodePipeline ' . '</h1>'; ?>
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </body>
</html>
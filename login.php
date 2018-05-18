<?php
require_once 'db_connect.php';
require_once 'session.php';
if ($_SESSION['user info'] != false)
    header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en">


<img src="css/bg-log.jpg" style="position:fixed; margin-top:-5%;">

<head>
    <meta charset="UTF-8">
    <title>BitSell</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css" type="text/css">


</head>

    <body class="htmlbody">

    <div class="data-box">

        <div class="container">

        <img class="logo-login img-responsive" src="css/logo4.png" style="margin-bottom:20px;">

            <h2 style="color:lightblue">Login</h2>
            <br>

    <form method="post" action="check_login.php">
                <input class="input" type="email" name="email" placeholder="E-mail" required><br><br>
                <input class="input" type="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" name="register" value="Login">
                <?php if (isset($_GET['status'])) {
                        echo "<p style='color: red;'>email or passowrd is incorrect</p>";
                }?>
            </form>

        <br>

        <div style="background-color:rgba(255,255,255,0.2); border-radius:10px;"><a class="switch-link" href="register.php"><p>Don't have an account?<br>Sign Up Here</p></a></div>

    </div>

    </div>





</body>






</html>

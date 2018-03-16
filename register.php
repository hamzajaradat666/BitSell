<!DOCTYPE html>
<html lang="en">

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
        
        <img class="logo-login img-responsive" src="css/logo.png" style="margin-bottom:20px;">
        
            <h2>Sign up</h2>
            <br>
        
    <form method="post" action="save_user.php">
        <input class="input" type="text" name="username" placeholder="Username" required><br><br>
        <input class="input" type="email" name="email" placeholder="E-mail" required><br><br>
        <input class="input" type="password" name="password" id="password" placeholder="Password" required><br><br>
        <input class="input" type="password" name="password2" id="password_confirm" placeholder="Confirm password" required><br><br>
        <input type="submit" name="signup_submit" value="Sign Up">
    </form>
            
            
        <br>
            
        <a class="switch-link" href="login.php"><p>Already have an account?<br>Login Here</p></a>
            
    </div>
    
    </div>
    




</body>

</html>

<?php

if (!isset($_GET['id']))
    die('bad access1');

$_id = (int)$_GET['id'];
if ($_id == 0)
    die('bad access2');
require_once ('users_api.php');

$user = bsf_users_get_by_id($_id);
bsf_db_close();

if ($user == NULL)
    die('bad user id');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User - <?php echo $user->username ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css" type="text/css">


</head>

<body class="htmlbody" style="background-color:white">


<div class="data-box">
    
    <div class="container">
        
        <a href="index.php"><img class="logo-login img-responsive" src="css/logo.png" style="margin-bottom:20px;"></a>
 
        <h1>Edit User Information</h1><br>
        
        <h2><?php echo $user->username; ?></h2>
        
        <form method="post" action="update_user.php?id= <?php echo $_id; ?>">
            
            <input class="input" value="<?php echo $user->username ?>" type="text" name="username" placeholder="Username" required>
            <input class="input" value="<?php echo $user->email ?>" type="email" name="email" placeholder="E-mail" required>
            <input class="input" type="password" name="password" id="password" placeholder="Password" required>
            <input class="input" type="password" name="password2" id="password_confirm" placeholder="Confirm password" required>
            <input type="submit" name="signup_submit" value="Edit <?php echo $user->username ?> information">
            
        </form>
    </div>
</div>



</body>

</html>
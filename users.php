<!DOCTYPE html>
<html>
<!-------------------------------------------------------------------------------------------------------------------------------------------->

<head>
    <title>
BitSell
    </title>

    <script src="js/script.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style.css" type="text/css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>




</head>



<body class="container col-sm-9">
    <!------------------------------------------------------------------------------------------------------------------------------------------>


    <header>
        <nav class="navbar navbar-expand-md navbar-ligth  bg-ligth">
            <a class="navbar-brand col-sm-1" href="index.php"><img class="w-100 navlogo" src="css/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>

        </button>
            <a href="cart.php" style="margin-left: 5px">
                <span class="caret">Shopping Cart<img src="css/shopcart.png" width="50px;"></span></a>
        </nav>
    </header>

    <br>
    <br>
    <br>
    <hr>

    <div class="mybody">
        <div class="container">
            <?php
            require_once 'db_connect.php';
            include_once('users_api.php');
            $users = bsf_users_get();
            $users_count = count($users);
            if ($users_count == 0)
                die('no users');
            echo '<table class="table table-hover">';
            echo '<thead><tr><th>User Name</th><th>Email</th><th>is admin?</th><th>Remove Users</th><th>Edit Users</th></tr>';
            echo '</thead><tbody>';

            for ($i = 0; $i < $users_count; $i++) {
                $user = $users[$i];
                echo '<tr>';
                echo "<td><a href=\"user_profile.php?id=$user->user_id\">" . $users[$i]->username  . "</a></td>";
                echo "<td>" . $users[$i]->email     . "</td>";
                $is_admin =  $users[$i]->isadmin == 1 ? 'YES': 'NO'; echo "<td>" . $is_admin. "</td>";
                echo "<td><a href=\"delete_user.php?id=$user->user_id\">delete</a></td>";
                echo "<td><a href=\"edit_user.php?id=$user->user_id\">Edit</a></td>";
                echo '</tr>';
            }
            echo '</tr></tbody></table>';
            bsf_db_close();

            ?>

        </div>


    </div>


    <!-------------------------------------------------------------------------------------------------------------------------------------->




</body>

<hr>


</html>

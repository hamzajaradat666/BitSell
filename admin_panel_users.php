<?php
require_once 'db_connect.php';
require_once 'session.php';
require_once 'users_api.php';
if (!isset($_GET['id']) || $_SESSION['user info'] == false)
    header('location: index.php?status=failed');

$_id = (int)$_GET['id'];
if ($_id == 0)
    header('location: index.php?status=failed');
$user = bsf_users_get_by_id($_id);
if (!$user)
    header('location: index.php?status=failed');

if ($user->isadmin != 1 || $user->user_id != $_SESSION['user info']->user_id)
    header('location: index.php?status=failed');






?>
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



<body>
    <!------------------------------------------------------------------------------------------------------------------------------------------>



    <div class="mybody">



        <header>
            <nav class="navbar navbar-expand-md navbar-dark  bg-dark">

                <a class="navbar-brand col-sm-1" href="index.php">
                <img class="navlogo" src="css/logo3.png" width="200px;">
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">

                    <form class="form-inline mt-0 mt-md-0">


                        <a href="admin_panel.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-success text-light " type="button">Back</button></a>
                        <a href="admin_panel_users.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-primary text-light " type="button">Users</button></a>
                        <a href="admin_panel_items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-danger text-light " type="button">Items</button></a>
                        <a href="admin_panel_brand_type.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-secondary text-light " type="button">Catagories</button></a>
                        <!--<a href="items.php?id=<?php echo $_SESSION['user info']->user_id ?>"><button  class="cata-links btn btn-outline-warning text-light " type="button">User View</button></a>-->
                        
                        

                    </form>
                </div>
            </nav>



        </header>

        <br>
        <br>
        <div class="container">
            <?php
            include_once('users_api.php');
            $users = bsf_users_get();
            if(!$users)
                die('no users');

            $users_count = count($users);
            echo '<table class="table table-hover">';
            echo '<thead><tr><th>User Name</th><th>Email</th><th>is admin?</th><th>Remove Users</th></tr>';
            echo '</thead><tbody>';

            for ($i = 0; $i < $users_count; $i++) {
                $user = $users[$i];
                echo '<tr>';
                echo "<td><a href=\"user_profile.php?id=$user->user_id\">" . $users[$i]->username  . "</a></td>";
                echo "<td>" . $users[$i]->email     . "</td>";
                $is_admin =  $users[$i]->isadmin == 1 ? 'YES': 'NO'; echo "<td>" . $is_admin. "</td>";
                echo "<td><a href=\"delete_user.php?id=$user->user_id\">Delete</a></td>";
                echo '</tr>';
            }
            echo '</tr></tbody></table>';
            bsf_db_close();

            ?>

        </div>



    </div>



 

</body>

</html>

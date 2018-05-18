 <header>
        <nav class="navbar navbar-expand-md navbar-dark  bg-dark ">

            <a class="navbar-brand" href="index.php">
                <img class="navlogo" src="css/logo4.png" width="200px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <form class="form-inline mt-0 mt-md-0" action="search.php">

                    <h1 class="fancy_header text-secondary mt-2 ">Everything You Need</h1><h1 style="color:darkred">!</h1>

                    <div class="dropdown">

                        <button class="cata-links btn btn-outline-warning  dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret">PC's &amp; Laptops</span></button>


                        <ul class="dropdown-styles dropdown-menu bg-light">
                            <li><a href="types.php?type=50">Desktop System</a></li>
                            <li><a href="types.php?type=30">Laptops & Notebooks</a></li>
                            <li><a href="types.php?type=28">Custom PC</a></li>
                            <li><a href="types.php?type=31">Mini PC</a></li>
                            <li><a href="types.php?type=27">Barebone</a></li>
                            <li><a href="types.php?type=32">Tablet PC</a></li>

                        </ul>


                    </div>

                    <div class="dropdown">

                        <button class="cata-links btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret">Hardware & Software</span></button>


                        <ul class="dropdown-styles dropdown-menu bg-light">
                            <li><a href="types.php?type=6">DRAM Memory</a></li>
                            <li><a href="types.php?type=52">CPU & Processor</a></li>
                            <li><a href="types.php?type=7">External Enclosure</a></li>
                            <li><a href="types.php?type=8">Fan & Heatsink</a></li>
                            <li><a href="types.php?type=9">Hard Drive</a></li>
                            <li><a href="types.php?type=10">Input & Output Device</a></li>
                            <li><a href="types.php?type=11">Monitor & Display</a></li>
                            <li><a href="types.php?type=12">Motherboard</a></li>
                            <li><a href="types.php?type=13">Multimedia</a></li>


                        </ul>

                    </div>

                        <input class="col-sm-2 form-control mt-1 mr-sm-2" type="text" name="search_query" placeholder="Search" aria-label="Search">
                        <button class="col-xm-1 btn btn-outline-success mt-2 my-2 my-sm-0" type="submit" style="margin-left: 5px">Search</button>

                    </form>


                    <div class="dropdown">

                        <?php
                        require_once 'db_connect.php';
                        if($_SESSION['user info'] == false) {
                            echo '<a href="login.php"><button class="btn btn-outline-danger text-secondry" type="button">
                                   <span class="caret">Login</button></a>';
                        }
                        else {
                            echo ' <button class="btn btn-outline-danger text-secondry dropdown-toggle" type="button" data-toggle="dropdown">
                                   <span class="caret">'.$_SESSION['user info']->username.'</span></button>
                                   <ul class="dropdown-menu dropdown-styles">
                                    <li><a href="edit_user.php?id='. $_SESSION['user info']->user_id .'">Edit Information</a></li>';
                            if ($_SESSION['user info'] != false && $_SESSION['user info']->isadmin == 1)
                            echo '<li><a href="admin_panel.php?id='. $_SESSION['user info']->user_id.'"><span class="caret">Admin Panel</span></a></li>';
                            echo '<li><a href="logout.php">Log Out</a></li>';

                                    echo '</ul>';
                        }


                        ?>

                    </div>

                    <a href="cart.php"><span class="caret"><img class="" style="width:50px" src="css/shopcart.png"></span></a>

                </form>
            </div>

        </nav>

    </header>

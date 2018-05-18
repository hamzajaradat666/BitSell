<nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
            <?php
            require_once 'db_connect.php';
                    
                  
                    // display the links to the pages
                for ($page=1;$page<=$number_of_pages;$page++)
           echo '<li class="page-item"><a class="page-link" href="'.$script_name.'?page=' . $page . '">' . $page . '</a></li>';
            ?>
            
        </ul>
    </nav>
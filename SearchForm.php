<?php

// Starting session if not yet initiated.

        session_start();
        
//  Declaring files required for page to function properly    
        
        $page_title = 'Search Page';
        require_once  'Header.php';
        require_once  'appvars.php';
        require_once  'library.php';
        require_once  'library.php';
            
//  Initiating of my object that will capture all modifications done on this file          
            
            $monitoringobjt =   new Monitoring("SearchForm.php");
            $monitoringobjt->filemodification();
            
//  Check to see if the user is logged in          
            
            if (!isset($_SESSION['ID'])) {
                    echo '<p>Please <a href="userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['email'] . '. <a href="logout.php">Log out</a>.</p>');
                }

              
                $link = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA) or die (mysqli_error("Could not connect"));
                $query    =   "SELECT * FROM admin_table"; 
                $results    = mysqli_query($link, $query) or die("Could not fucking work");
                
                echo '<form>';
                echo '<div>';
                echo '<div>';
                        echo '<h5>Name</h5>';
                            echo '<select name="name">';
                                while ($row= mysqli_fetch_array($results)) {
                                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                }
                            echo '</select>';
                    echo '</div>';
                $query1    =   "SELECT * FROM admin_table"; 
                $results1    = mysqli_query($link, $query) or die("Could not fucking work");    
                    echo '<div>';
                        echo '<h5>Surename</h5>';
                            echo '<select name="surname">';
                                while ($row1= mysqli_fetch_array($results1)) {
                                        echo '<option value="'.$row1['email'].'">'.$row1['email'].'</option>'; 
                                }
                            echo '</select>';
                    echo '</div>';
              echo '</div>';      
              echo '</form>';
             
?>

s

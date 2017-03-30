
<?php 
// Declaring scripts that is required to run page correctly

        require_once  'session_start.php';
        $page_title = 'Log Out Page';
        require_once  'Header.php';
        require_once  'library.php';
        
//  Initiating of my object that will capture all modifications done on this file          
            
            $monitoringobjt =   new Monitoring("logout.php");
            $monitoringobjt->filemodification();  

        
//  Start of the data validation
        
         if (isset($_POST['submit'])){
                         
//  Declaring logout variable that is required to  make sure the sure wants to log out          
        
        $logoutvar = $_POST['logout'];
             
            if($logoutvar=='Y') {
                
//  If the user wishes to log out the following statements will run
                
                if (isset($_SESSION['ID'])){ 
                $_SESSION = array();
                    if (isset($_COOKIE[session_name()])) {
                        
//  Checking to see if cookies was used to run the website                      
                        
                    setcookie(session_name(),'',time()-3600);
                }
                    session_destroy();
            }
            
                    setcookie('ID', '', time() - 3600);
                    setcookie('email', '', time() - 3600);   
                    
//  Setting up headers to redirect the user to the index page.                  
            
            $home = 'http://'.$_SERVER['HTTP_HOST'].'/index.php';
            header('Location:'.$home);
         }
    else {
            echo '<p>Would you like to return to the <a href="../index.php">home page </a><p>';
 }
         }

// If a session variable is available the for will be displayed in browser.
        
         if(($_SESSION['ID'])) 
            {
        ?>
    
        <form method="post" action=<?php $_SERVER['PHP_SELF'];?>>
            <fieldset>
                <h3>Are you sure you want to log out?</h3><br>
                Yes<input type="radio" name="logout"  value="Y">
                No<input type="radio" name="logout"  value="N">
                <input type="submit" name="submit"  value="Submit">
            </fieldset>
            
        </form>
       <?php 
            }
            require_once 'Footer.php';
       ?>
  

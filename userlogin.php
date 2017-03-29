
<?php 
//  Declaring files required for page to function properly 

            require_once  'session_start.php';
            $page_title = 'User Login';
            require_once  'Header.php';
            require_once  'appvars.php';
            
//  Declaring the errormsg variable and connecting to the database required log on to the website          

            $errormsg   =   "";
            $link       =   mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA);

//  Checking to see if their is a session variable and if a log in is required.
    
        if (!isset($_SESSION['ID'])) {
            if(isset($_POST['submit'])) {
                
//  Declaring variables that will get there data from the Post form.              
                
                $loggedinuser           =   mysqli_real_escape_string($link, trim($_POST['email']));
                $loggedinuserpassword   =   mysqli_real_escape_string($link, trim($_POST['pass']));
                
//  Checking to see if all the details is correctly filled in the form 
                
                if (!empty($loggedinuser) && !empty($loggedinuserpassword)){
                    
//  Quering the database to see if the user is registered on the system.
                    
                    $logquery = "SELECT ID, email FROM admin_table WHERE email='$loggedinuser' AND password=SHA('$loggedinuserpassword')";
                    $logresults = mysqli_query($link, $logquery) or die('Did not connect to server');   
                    
//  If the user exists on the system the following th session variables and cookies will be set                  
                    
                        if(mysqli_num_rows($logresults)== 1 ){
                            $row = mysqli_fetch_array($logresults);
                            
                            $_SESSION['ID']     =   $row['ID'];
                            $_SESSION['email']  =   $row['email'];
                            setcookie('ID',$row['ID'],time()+(60*60*24*7));
                            setcookie('email',$row['email'],time()+(60*60*24*7));
                            
//  Setting the home page of the login is successful                          
                            
                            $home               =   'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php';
                            header('Location:'.$home);
                        }
                        else {
                            $errormsg = 'Sorry, you must enter a valid username and password to log in';
                        }
                    }
                        else {
                            $errormsg ="Login details not entered";
                        }
                    }
                
                }
                
//  Checking to see if the session variable is set or not. IF not the form will be displayed on the screen
                
        if (empty($_SESSION['ID'])){
            $errormsg;
        ?>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
           
                <div class="form-group">
            <label>Email Address:</label>
            <input class="form-control" type="text" name="email" id="username"><br>
                </div>
                <div class="form-group">
            <label>Password:</label>
            <input class="form-control" type="password" name="pass" id="password"><br>
                </div>
            <input type="submit" name="submit" value="Submit"><br>
            
            <?php echo $errormsg ?>
            </fieldset
        </form>
        <?php 
        }
        else {
            
//  If already logged in the page will direct you to the home page.          
            
            $home   =   'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php';
            header('Location:'.$home);
            
        }
            require_once 'Footer.php';
        ?> 

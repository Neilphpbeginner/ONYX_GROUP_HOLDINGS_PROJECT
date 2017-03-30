
<?php 
// Starting session if not yet initiated.

        session_start();
        
//  Declaring files required for page to function properly    
        
        $page_title = 'Sign UP';
        require_once  'Header.php';
        require_once  'appvars.php';
        require_once  'library.php';
        require_once  'library.php';
            
//  Initiating of my object that will capture all modifications done on this file          
            
            $monitoringobjt =   new Monitoring("signup_page.php");
            $monitoringobjt->filemodification();
        
//  Declaring varialbles required for data to be captured in the database   
        
                $signupname         = "";
                $signupsurename     = "";
                $signupemail        = "";
                $signuppw           = "";
                $signuppw2          = "";
                $signupmassage      = "";
//  The start of validating the information correctly entered into the form              
               
                if (isset($_POST['submit'])) {
                
//                Setting up the link to the database to be used
                                    
                $link               = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASSWORD, DB_HOST_DATA) or die (mysqli_error("Could not connect"));    
                
//  Changing the varialbels to accept the Posted information from the form data
                
                $signupname         = mysqli_real_escape_string($link, trim($_POST['name']));
                $signupsurename     = mysqli_real_escape_string($link, trim($_POST['surname']));
                $signupemail        = mysqli_real_escape_string($link, trim($_POST['email']));
                $signuppw           = mysqli_real_escape_string($link, trim($_POST['password']));
                $signuppw2          = mysqli_real_escape_string($link, trim($_POST['password2']));
                $signupoutputform   = FALSE;
                
//  Setting up of the object that will confirm if the password  meets the requirements of the expression
               
                $passwordfunction   = new password($signuppw);
                $signupmassage      = '';
                
//  Validating of information and all flieds filled in on the form.
                    
                    if ( !empty($signupname) && !empty($signupsurename) && !empty($signupemail) && !empty($signuppw) && empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have to re enter in your password';
                    }
                    if ( !empty($signupname) && !empty($signupsurename) && !empty($signupemail) && empty($signuppw) && !empty($signuppw2 )){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have enter in your password';
                    }
                    
                    if ( empty($signupname) && !empty($signupsurename) && !empty($signupemail) && !empty($signuppw) && !empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have enter in your Name';
                    }
                    if ( !empty($signupname) && empty($signupsurename) && !empty($signupemail) && !empty($signuppw) && !empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have enter in your Surname';
                    }
                    if ( !empty($signupname) && !empty($signupsurename) && empty($signupemail) && !empty($signuppw) && !empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have enter in your Email Address';
                    }
                    if ( !empty($signupname) && !empty($signupsurename) && empty($signupemail) && !empty($signuppw) && !empty($signuppw2)){
                        $signupoutputform = TRUE;
                        $signupmassage = 'You still have enter in your verification code';
                    }
                            if ( !empty($signupname) && !empty($signupsurename) && !empty($signupemail) && !empty($signuppw) && !empty($signuppw2)){
                                $signupoutputform = TRUE;
                                
//  Checking to see if the passwords entered is matching and no errors accured and password validation is done
                                
                                if ($signuppw == $signuppw2 && $passwordfunction->passwordValidation()){
 
//  quering the databse if the user being created does not yet already loaded on the database
                                    
                                    $signupquery = "SELECT * FROM admin_table WHERE email='$signupemail'";
                                    $signupqueryresult = mysqli_query($link, $signupquery) or die ("Could not select users");

                                   
//  If no user was found the following statements will add the new user to the system
                                    
                                    if(mysqli_num_rows($signupqueryresult)==1){
                                       $signupmassage = 'User already registered on our system';
                                   }else{  
                                        
                                            $createuser = "INSERT INTO admin_table(name,surname,email,password,joindate) VALUES('$signupname','$signupsurename','$signupemail',SHA('$signuppw'),NOW())";
                                            $createuserresults = mysqli_query($link, $createuser) or die ('Could not register User');
                                           
//  Setting up of the Session Variables and cookies if required.
                                            
                                            $_SESSION['ID']=$row['ID'];
                                            $_SESSION['email']=$row['email'];
                                            setcookie('ID',$row['ID'],time()+(60*60*24*7));
                                            setcookie('email',$row['email'],time()+(60*60*24*7));
                                            
//  Setting up of the home page if user is created sucsessfully 
                                            
                                            $home = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php';
                                            header('Location:'.$home);
                                            $signupmassage = 'User successfully added to our system';

                                    }
                                }
                                    else{
                                            $signupmassage = 'Your password needs to be atleast 10 charaters long including one special charater, one number and one Capital letter and password should be corrosponding';

                            }
                        } 
                    $signupoutputform=TRUE;
                    }
                else {
                    $signupoutputform=TRUE;
               }
                
                                if($signupoutputform){
                                    
//  Start of Form to be entered.                               

            ?>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" id="name" value=<?php echo $signupname;?>><br /> 
            </div>
            <div class="form-group">
                <label>Surname:</label>
                <input class="form-control"t type="text" name="surname" id="surname" value=<?php echo $signupsurename;?>><br /> 
            </div>
            <div class="form-group">
                <label>Email Address:</label>
                <input class="form-control" type="text" name="email" id="email" value=<?php echo $signupemail;?>><br /> 
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" id="password" value=<?php echo $signuppw;?>><br />
            </div>
            <div class="form-group">
                <label>Re-Enter Password:</label>
                <input class="form-control" type="password" name="password2" id="password2" value=<?php echo $signuppw2;?>><br />
            </div>
                      
            <?php echo $signupmassage;?><br><br>
            <input type="submit" name="submit" value="Submit">
           
        </form>
        <?php 
            }
            require_once 'Footer.php';
                      
        ?>

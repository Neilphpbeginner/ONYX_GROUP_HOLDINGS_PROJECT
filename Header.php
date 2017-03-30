<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <?php echo '<title>'.$page_title.'</title>';?>
        <link rel="stylesheet" type=text/css href="/css/main.css">
        <script type="text/javascript" src="/javascript/main.js"></script>    
        
    
    </head>
    <body onload="currentTime();">
        <ul>
            <li><a href="\index.php">Home</a></li>
                <li class="dropdown">
                <a href="#" class="dropbtn">Application</a>            
            <div class="dropdown-content">                       
                        <a href="signup_page.php">Signup</a>
                        <a href="userlogin.php">Log in</a>  
                        <a href="logout.php">Log Out</a>
                        <a href="SearchForm.php">Search Form</a>
            </div>
                
                </li>
                
            
        </ul>
        

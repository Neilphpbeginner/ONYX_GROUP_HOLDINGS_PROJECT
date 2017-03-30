
<!--
Author Neil Lemmer
Project: ONYX Group holding Project
-->

        <?php
//        Declaring the session script to check id the session 
            require_once  'session_start.php';
//        Defining title of the page to be displayed in the title bar.
            $page_title = 'Home Page';
//        Default header that will be used in all php scripts
            require_once  'Header.php';
//        Application variables needed to run the app.    
            require_once  'appvars.php';
//        Default Footer that will be used in all php scripts
            require_once  'Footer.php';
//        Declaring library file that contains all the classes required to run the site    
            require_once  'library.php';
            
//  Initiating of my object that will capture all modifications done on this file          
            
            $monitoringobjt =   new Monitoring("index.php");
            $monitoringobjt->filemodification();
            echo '<img src="logos-onyx-1.png">';
            
       if(!isset($_SESSION['email']) && !isset($_SESSION['ID'])){
           
//        If no session variables is available then the page will be redirected to the signu page      
           
           $home   =   'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'userlogin.php';
           header('Location:'.$home);
           
       } 
           
?>

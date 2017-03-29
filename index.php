
<!--
Author Neil Lemmer
Project: ONYX Group holding Project
-->

        <?php
//        Defining the session script to check id the session 
            require_once  'session_start.php';
//        Defining title of the page to be displayed in the title bar.
            $page_title = 'Home Page';
//        Default header that will be used in all php scripts
            require_once  'Header.php';
//        Application variables needed to run the app.    
            require_once  'appvars.php';
//        Default Footer that will be used in all php scripts
            require_once  'Footer.php';
            
       if(!isset($_SESSION['email']) && !isset($_SESSION['ID'])){
           
           $home   =   'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'signup_page.php';
           header('Location:'.$home);
           
       }
           
?>

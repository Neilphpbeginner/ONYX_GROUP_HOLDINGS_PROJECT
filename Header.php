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
                <a href="#" class="dropbtn">Tables</a>            
            <div class="dropdown-content">                       
                        <a href="/guitarwars/Guitarwars_table.php">Guitarwars Scores</a>
                        <a href="/guitarwars/guitar_high_scores.php">Register High Score</a>  
                        <a href="/guitarwars/removehighscore.php">Remove Unwanted Scores</a>
                        <a href="/guitarwars/approvescore.php">Admin Page</a>
            </div>
                </li>
                
            
        </ul>
        

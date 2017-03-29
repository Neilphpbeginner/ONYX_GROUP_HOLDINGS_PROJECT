<?php
session_start();
            if (!isset($_SESSION['ID'])) {
                if (isset($_COOKIE['ID']) && isset($_COOKIE['email'])){
                    $_SESSION['ID']   =   $_COOKIE['ID'];
                    $_SESSION['email']   =   $_COOKIE['email'];
                }
            }
            
          
            
  ?>


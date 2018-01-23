<?php
    $db = mysqli_connect('127.0.0.1','root','9849','boutique');
    if(mysqli_connect_errno())
    {
        echo "Database connection failed due to following errors : " . mysqli_connect_error(); 
        die();
    }
    
    
    define ('BASEURL', '/boutique/');
    ?>
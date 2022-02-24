<?php 
    
    $conn = mysqli_connect('localhost', 'root', '', 'db_hotel');
    
    if ($conn) {
        // echo 'Connected';
    }else {
        echo 'Error:500';
    }

?>
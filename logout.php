<?php
    require_once 'connection.php';
    
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
        unset($_SESSION['loggedin']);
        
        header('location:index.html');
    }else{
        echo "<br><div><p>Sorry! you haven't loggedin</p></div>";
    }
?>
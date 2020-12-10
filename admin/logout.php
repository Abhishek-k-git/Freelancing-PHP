<?php
    require_once 'connection.php';
    
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        
        header('location:index.php');
    }else{
        echo "<br><div><p>Sorry! you haven't loggedin</p></div>";
    }
?>
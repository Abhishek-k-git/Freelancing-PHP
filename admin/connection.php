<?php
    $db_host = "localhost";
    $db_user   = "root";
    $db_pass   = "";
    $conn= new mysqli($db_host, $db_user, $db_pass);
    $query= "CREATE DATABASE IF NOT EXISTS freelancing";
    $conn->query($query);
    $db_name= "freelancing";

    $conn= new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($conn->connect_error){
        die("FATAL ERROR");
    }
    
    $query="CREATE TABLE IF NOT EXISTS admin(
        EMAIL VARCHAR(255) NOT NULL,
        PASS VARCHAR(255) NOT NULL,
        PHOTO VARCHAR(255),
        PRIMARY KEY(EMAIL)
        )";
        $conn->query($query);

    $query="SELECT * FROM admin";
    $result = $conn->query($query);
    if($result->num_rows == 0){
        $emai = 'admin123@mail.com';
        $email = mysqli_real_escape_string($conn, $emai);
        $pass = password_hash('admin123', PASSWORD_BCRYPT);
        $password = mysqli_real_escape_string($conn, $pass);
        $query="INSERT INTO admin(EMAIL, PASS, PHOTO)
        VALUES('$email','$pass','img/admin.png')";
        $result = $conn->query($query);
    }

    $query="CREATE TABLE IF NOT EXISTS users(
        ID INT AUTO_INCREMENT,
        EMAIL VARCHAR(255) NOT NULL,
        PASS VARCHAR(255) NOT NULL,
        PHOTO VARCHAR(255),
        STATUS VARCHAR(255),
        PRIMARY KEY(ID)
        )";
        $conn->query($query);

    $query="SELECT * FROM users";
    $result = $conn->query($query);
    if($result->num_rows == 0){
        $emai = 'admin123@mail.com';
        $email = mysqli_real_escape_string($conn, $emai);
        $pass = password_hash('admin123', PASSWORD_BCRYPT);
        $password = mysqli_real_escape_string($conn, $pass);
        $query="INSERT INTO users(EMAIL, PASS, PHOTO, STATUS)
        VALUES('$email','$pass','img/admin.png','Admin')";
        $result = $conn->query($query);
    }

    $query="SELECT * FROM users";
    $result = $conn->query($query);
    if($result->num_rows == 1){
        $pass = password_hash('jorg123', PASSWORD_BCRYPT);
        $query="INSERT INTO users(EMAIL, PASS, PHOTO, STATUS)
        VALUES('jorg123@mail.com','$pass','images/jorg.jpg','freelancer')";
        $result = $conn->query($query);
    }

    $query="SELECT * FROM users";
    $result = $conn->query($query);
    if($result->num_rows == 2){
        $pass = password_hash('test123', PASSWORD_BCRYPT);
        $query="INSERT INTO users(EMAIL, PASS, PHOTO, STATUS)
        VALUES('test123@mail.com','$pass','images/test.jpg','company')";
        $result = $conn->query($query);
    }

    $query="SELECT * FROM users";
    $result = $conn->query($query);
    if($result->num_rows == 3){
        $pass = password_hash('register3', PASSWORD_BCRYPT);
        $query="INSERT INTO users(EMAIL, PASS, PHOTO, STATUS)
        VALUES('register3@mail.com','$pass','images/register.jpeg','freelancer')";
        $result = $conn->query($query);
    }

    session_start();
?>
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
    
    $query="CREATE TABLE IF NOT EXISTS jobs(
        ID INT AUTO_INCREMENT,
        EMAIL VARCHAR(255) NOT NULL,
        MOBILE INT NOT NULL,
        CONTACT_NAME VARCHAR(255) NOT NULL,
        CATEGORY VARCHAR(255) NOT NULL,
        JOB_TITLE VARCHAR(255) NOT NULL,
        COUNTRY VARCHAR(255) NOT NULL,
        CITY VARCHAR(255) NOT NULL,
        DATE TIMESTAMP NOT NULL,
        DESCRIPTION TEXT NOT NULL,
        REQUIREMENTS TEXT NOT NULL,
        PAY VARCHAR(255) NOT NULL,
        PHOTO VARCHAR(255),
        PRIMARY KEY(ID)
        )";
        $conn->query($query);

    $query="SELECT * FROM jobs";
    $result = $conn->query($query);
    if($result->num_rows == 0){
        $query="INSERT INTO jobs(EMAIL, MOBILE, CONTACT_NAME, CATEGORY, JOB_TITLE, COUNTRY, CITY, DESCRIPTION, REQUIREMENTS, PAY, PHOTO)
        VALUES('test123@mail.com', '1209384756', 'Abhishek, manager', 'Web development', 'swadhyay', 'USA', 'new york', 'You have to create a website similar to Freelancer.com with all features', 'php, mysql, javascript', '$120', 'images/one.png')";
        $result = $conn->query($query);
    }

    $query="SELECT * FROM jobs";
    $result = $conn->query($query);
    if($result->num_rows == 1){
        $query="INSERT INTO jobs(EMAIL, MOBILE, CONTACT_NAME, CATEGORY, JOB_TITLE, COUNTRY, CITY, DESCRIPTION, REQUIREMENTS, PAY, PHOTO)
        VALUES('jorg123@mail.com', '9126584756', 'jorg, manager', 'Data entry', 'my company', 'USA', 'new york', 'list all listed company name and there contact details with address starting new york lane2 to lane 20', 'ms excel', '$60', 'images/second.png')";
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

    $query="CREATE TABLE IF NOT EXISTS messages(
        ID INT AUTO_INCREMENT,
        EMAIL VARCHAR(255) NOT NULL,
        SENDER VARCHAR(255) NOT NULL,
        DESCRIPTION VARCHAR(255),
        DATE TIMESTAMP NOT NULL,
        PRIMARY KEY(ID)
        )";
        $conn->query($query);

    $query="SELECT * FROM messages";
    $result = $conn->query($query);
    if($result->num_rows == 0){
        $emai = 'jorg123@mail.com';
        $email = mysqli_real_escape_string($conn, $emai);
        $desc = 'Hello, I want to work with you';
        $description = mysqli_real_escape_string($conn, $desc);
        $query="INSERT INTO messages(EMAIL, SENDER, DESCRIPTION)
        VALUES('$email','admin123@mail.com','$description')";
        $result = $conn->query($query);
    }

    $query="SELECT * FROM messages";
    $result = $conn->query($query);
    if($result->num_rows == 0){
        $emai = 'test123@mail.com';
        $email = mysqli_real_escape_string($conn, $emai);
        $desc = 'Hello, lets start';
        $description = mysqli_real_escape_string($conn, $desc);
        $query="INSERT INTO messages(EMAIL, SENDER, DESCRIPTION)
        VALUES('$email','jorg123@mail.com','$description')";
        $result = $conn->query($query);
    }

    $query="CREATE TABLE IF NOT EXISTS job_applied(
        ID INT AUTO_INCREMENT,
        MY_EMAIL VARCHAR(255) NOT NULL,
        COMPANY_EMAIL VARCHAR(255) NOT NULL,
        COMPANY VARCHAR(255) NOT NULL,
        COUNTRY VARCHAR(255),
        DATE TIMESTAMP NOT NULL,
        JOB_TITLE VARCHAR(255) NOT NULL,
        PRIMARY KEY(ID)
        )";
        $conn->query($query);

    $query="SELECT * FROM job_applied";
    $result = $conn->query($query);
    if($result->num_rows == 0){
        $myemai = 'jorg123@mail.com';
        $myemail = mysqli_real_escape_string($conn, $myemai);
        $compemai = 'test123@mail.com';
        $compemail = mysqli_real_escape_string($conn, $compemai);
        $comp = 'swadhyay';
        $coun = 'USA';
        $job_title = 'Web development';
        $query="INSERT INTO job_applied(MY_EMAIL, COMPANY_EMAIL, COMPANY, COUNTRY, JOB_TITLE)
        VALUES('$myemail','$compemail','$comp','$coun','$job_title')";
        $result = $conn->query($query);
    }


    session_start();

?>
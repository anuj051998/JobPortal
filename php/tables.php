<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "jobdatabase";
    $dbConnection = mysqli_connect($host, $user, $password);
    try{
        mysqli_query($dbConnection,"CREATE DATABASE jobdatabase");
    }
    catch(Exception $e){}

    $conn = mysqli_connect($host, $user, $password, $database);
    try{
        mysqli_query($conn, "CREATE TABLE administrator(userid varchar(100) primary key,fullName varchar(100),pwd varchar(100),phone varchar(10),photo varchar(100) DEFAULT 'admin.png', maintainanceStatus varchar(10) DEFAULT 'NO'
        )");
    }
    catch(Exception $e){}
    try{
        mysqli_query($conn, "INSERT INTO administrator values('admin@gmail.com','Admin','administrator','9826038994','admin.png','NO')");
    }
    catch(Exception $e){}
    
    try{
        mysqli_query($conn, "CREATE TABLE visitors( ip varchar(100), city varchar(100), state varchar(100), country varchar(100), latitude varchar(10), longitude varchar(100), zipCode varchar(10), org varchar(100), dateofVisit Date DEFAULT CURRENT_DATE )");
    }
    catch(Exception $e){}

    try{
        mysqli_query($conn, 
        "CREATE TABLE jobs( jobId varchar(100) primary key, JobName varchar(100),jobLocation varchar(100), jobCategory varchar(100), lastDate Date DEFAULT CURRENT_TIMESTAMP, layout longtext null , isAvailable text null, viewCount int(100) DEFAULT 0, jobPic varchar(100) DEFAULT 'default.jpg', dateAdded Date DEFAULT CURRENT_DATE)");
    }
    catch(Exception $e){}

    try{
        mysqli_query($conn, 
        "CREATE TABLE comments( jobId varchar(100), commentId varchar(100), name varchar(100), email varchar(100), commentMessage varchar(100), Date_time varchar(100) DEFAULT CURRENT_TIMESTAMP)");
    }
    catch(Exception $e){}
    try{
        mysqli_query($conn, 
        "CREATE TABLE contacts(id int(10) primary key auto_increment, email varchar(100) unique, name varchar(100),subject text null, message text null, Date_time varchar(100) DEFAULT CURRENT_TIMESTAMP,replied VARCHAR(10) DEFAULT 'NO')");
    }
    catch(Exception $e){}

?>
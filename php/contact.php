<?php 

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require "../../conn.php";
    $sql = "INSERT INTO `contacts`(`email`, `name`, `subject`, `message`) VALUES ('$email','$name','$subject','$message')";
    if(!mysqli_query($conn,$sql))
    {
        $sql = "UPDATE `contacts` SET `name`='$name',`subject`='$subject',`message`='$message' WHERE `email`='$email'";
        mysqli_query($conn, $sql);
    }
?>
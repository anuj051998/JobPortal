<?php 

    $id = $_POST["id"];

    require "conn.php";

    if(!mysqli_query($conn, "UPDATE `jobs` SET `isAvailable`='NO' where `jobId` = '$id'"))
    {
        echo mysqli_query($conn);
    }
    else{
        echo "1";
    }
    

?>
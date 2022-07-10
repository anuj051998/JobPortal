<?php 


    require "conn.php";
    if(isset($_POST["getStatus"]))
    {
        $query = "SELECT `maintainanceStatus` from `administrator`";
        $res = mysqli_query($conn,$query);
        while($row = $res->fetch_assoc())
        {
            echo $row["maintainanceStatus"];
        }
    }

    if(isset($_POST["updateStatus"]))
    {
        $status = "";
        $query = "SELECT `maintainanceStatus` from `administrator`";
        $res = mysqli_query($conn,$query);
        while($row = $res->fetch_assoc())
        {
            $status = $row["maintainanceStatus"];
        }
        $updatedStatus = "";
        if($status == "ON")
        {
            $updatedStatus = "OFF";
        }
        else{
            $updatedStatus = "ON";
        }
        $query = "UPDATE `administrator` SET `maintainanceStatus`='{$updatedStatus}'";
        mysqli_query($conn,$query);
        echo $updatedStatus;
    }
    

?>
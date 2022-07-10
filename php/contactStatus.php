<?php 


    require "conn.php";
        $id = $_GET["id"];
        $status = "";
        $query = "SELECT `replied` from `contacts` where `id`='$id'";
        $res = mysqli_query($conn,$query);
        while($row = $res->fetch_assoc())
        {
            $status = $row["replied"];
        }
        $updatedStatus = "";
        if($status == "NO")
        {
            $updatedStatus = "YES";
        }
        else{
            $updatedStatus = "NO";
        }
        $query = "UPDATE `contacts` SET `replied`='{$updatedStatus}' where `id`='{$id}'";
        mysqli_query($conn,$query);
        echo $updatedStatus;
    
    

?>
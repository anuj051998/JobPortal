<?php 
    $ip = $_POST['ip'];
    require "conn.php";

    $res = mysqli_query($conn, "SELECT `isBlocked` from visitors where `ip` = '$ip'");
    $temp = "";
    while($row = $res->fetch_assoc())
    {
        $temp = $row['isBlocked'];
    }
    $newTemp = "YES";
    if($temp == "YES")
        $newTemp = "NO";
    mysqli_query($conn, "UPDATE `visitors` set `isBlocked` = '$newTemp' where `ip` = '$ip'");

    if($newTemp == "YES")
        echo "<i class='fa fa-check'></i>";
    else
        echo "<i class='fa fa-ban'></i>";
    


?>
<?php 

    require "conn.php";

    $query = "SELECT `JobName`,`jobId` from `jobs` WHERE `isAvailable` = 'YES' and `lastDate` > 'CURDATE()' and `jobName` LIKE '%".$_GET['query']."%' LIMIT 5";
    $sth = mysqli_query($conn, $query);
    $rows = array();
    while($row = $sth->fetch_assoc())
    {
        array_push($rows,$row);
    }
    
    print json_encode($rows);

?>
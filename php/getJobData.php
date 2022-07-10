<?php 

    require "conn.php";

    $query = "SELECT `JobName`, `viewCount` as visits from `jobs` where `viewCount` > 0 order by `viewCount` DESC LIMIT 30";
    $sth = mysqli_query($conn, $query);
    $rows = array();
    while($r = mysqli_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);

?>
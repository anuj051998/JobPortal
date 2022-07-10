<?php 

    require "conn.php";

    $query = "SELECT `dateOfVisit` as 'date',COUNT(ip) as `value` from `visitors` group by `dateOfVisit`";
    $sth = mysqli_query($conn, $query);
    $rows = array();
    while($r = mysqli_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);

?>
<?php 
if(isset($_POST["ip"]))
{
    $ip =  $_POST["ip"];
    $city = $_POST["city"];
    $state = $_POST["region"];
    $country = $_POST["country_name"];
    $long = $_POST["longitude"];
    $lat = $_POST["latitude"];
    $postal = $_POST["postal"];
    $org = $_POST["org"];
    require "conn.php";
    $query = "INSERT INTO visitors(`ip`, `city`, `state`, `country`, `latitude`, `longitude`, `zipCode`, `org`)  VALUES('$ip','$city','$state','$country','$lat','$long','$postal','$org')";
    mysqli_query($conn,$query);

    $query = "SELECT `isBlocked` from visitors where `ip` = '$ip'";
    $res = mysqli_query($conn, $query);
    while($row=$res->fetch_assoc())
    {
        echo $row['isBlocked'];
        break;
    }
}

?>
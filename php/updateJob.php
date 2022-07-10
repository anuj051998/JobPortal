<?php 
$jobName = $_POST["jobName"];
$jobLocation = $_POST["jobLocation"];
$lastDate = $_POST["lastDate"];
$jobCategory = $_POST["jobCategory"];
$id = $_POST['jobid'];
$isAvailable = $_POST['isAvailable'];
$pic = $_POST['jobPicture'];
$time = strtotime($lastDate);
$newformat = date('Y-m-d',$time);
require "conn.php";

$query = "UPDATE `jobs` SET `JobName`='$jobName',`jobCategory`='$jobCategory',`jobLocation`='$jobLocation',`lastDate`='$newformat',`jobPic`='$pic',`isAvailable`='$isAvailable' WHERE `jobId`='$id'";
if(!mysqli_query($conn, $query))
{
    echo "Could not Update<br>".mysqli_error($conn);
}
    else{
        echo "1";
    }

?>
<?php 

$target_file = "backup/db-backup.sql";
$myfile = fopen($target_file, "r") or die("Unable to open file!");
$fileRaw = fread($myfile,filesize($target_file));
fclose($myfile);

$queries = explode(";",$fileRaw);
require "conn.php";
foreach($queries as $query)
{
    if(!mysqli_query($conn, $query))
        echo mysqli_error($conn);
}


?>
<?php 

$target_file = "backup/db-backup.sql";
$myfile = fopen($target_file, "r") or die("Unable to open file!");
$fileRaw = fread($myfile,filesize($target_file));
fclose($myfile);

$queries = explode(";",$fileRaw);
foreach($queries as $query)
{
    echo $query."<br><br><br><br><br>";
}


?>
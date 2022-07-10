<?php 
    $name = $_POST["renameFile"];
    $newName = $_POST["newFileName"];
    rename("../uploads/".$name,"../uploads/".$newName);

?>

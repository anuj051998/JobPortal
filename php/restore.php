<?php 

    $target_dir = "backup";   
    $name = "";
    $tempName = "";
    $flag = 1;
    foreach($_FILES as $r)
    {
        $name = $r["name"];
        $target_file = $target_dir . basename($name);
        if (move_uploaded_file($r["tmp_name"], $target_file)) {
            $flag = 1;
        } else {
            $flag = 0;
        }
    }

    
        
    


?>
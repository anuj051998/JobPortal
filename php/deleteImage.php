<?php 
    $file = $_POST['filename'];
    unlink("../uploads/".$file);
    echo "Deleted Successfully<br>".$file;

?>
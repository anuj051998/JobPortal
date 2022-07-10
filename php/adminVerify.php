<?php 
    session_start();
    require "../../conn.php";

    $username = $_POST["username"];
    $password = $_POST["password"];



    $res = mysqli_query($conn, "SELECT * from `administrator` where `userid` = '$username'");

    if($res->num_rows == 0)
    {
        echo "User does not exists";
    }
    else{
        while($row = $res->fetch_assoc())
        {
            if($row['pwd'] == $password)
            {
                $_SESSION["userName"] = $row["fullName"];
                $_SESSION["userid"] = $row["userid"];
                $_SESSION["userProfile"] = $row["photo"];
                echo "OK Dashboard.php";
                //echo $_SESSION['userName'];
            }
            else{
                echo "Wrong password! Please try again..";
            }
            
        }
    }




?>

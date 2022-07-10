<?php 

    if(isset($_POST["jobName"]))
    {
        $jobId = $_POST['jobId'];
        $jobName = $_POST["jobName"];
        $lastDate = $_POST["lastDate"];
        $jobCategory = $_POST["jobCategory"];
        $jobLocation = $_POST["jobLocation"];
        $pic = $_POST['jobPicture'];
        $time = strtotime($lastDate);
        $newformat = date('Y-m-d',$time);
        require "conn.php";
        $query = "INSERT INTO jobs(`jobId`, `jobName`, `jobCategory`, `jobLocation`, `lastDate`,`isAvailable`,`jobPic`) VALUES('$jobId','$jobName','$jobCategory','$jobLocation','$newformat','NO','$pic')";
        if(!mysqli_query($conn,$query))
        {
            echo mysqli_error($conn);
        }
        else{
            echo "Job Added Successfully";
        }
    }
   if(isset($_FILES))
   {
    $target_dir = "../uploads/";
    
       $name = "";
       $tempName = "";
       foreach($_FILES as $r)
       {
            $name = $r["name"];
            $target_file = $target_dir . basename($name);
            if (move_uploaded_file($r["tmp_name"], $target_file)) {
                echo "The file has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
       }
       
   }

?>
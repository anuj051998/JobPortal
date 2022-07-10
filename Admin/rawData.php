<?php session_start(); ?>
<?php
    require "../php/conn.php";
    
    function job_Id($jobID){
        return $jobID+1;
    } 
    function job_name(){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $randstring.$characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }
    function job_location(){
        $location = array("Pune","Hyderabad","Chennai","Indore","Mumbai","Kolkata","Bangalore");
        $index = rand(0,6);
        return $location[$index];
    }
    function last_date(){
        return date();
    }

    function category(){
        $category = array("Agriculture,
        Food and
        Natural Resources",
    "Architecture and Construction
    ",
    "Arts, Audio/Video Technology and
        Communications",
    
    "Business Management and
        Administration
    ",
    "Education and Training",
    "Finance",
    "Government and Public
        Administration
    ",
    "Health Science",
    "Hospitality and Tourism",
    
    "Human Services",
    "Information Technology",
    "Law, Public Safety, Corrections and
        Security",
    "Manufacturing",
    "Marketing, Sales and Service
    ",
    "Science, Technology, Engineering
        and
        Mathematics",
        "Transportation, Distribution and Logistics");

        $index = rand(0,15);
        return $category[$index];
    }
    $id = 500;
    for($i=0;$i<10000;$i++)
    {
        
        $time = strtotime("01-01-2030");
        $newformat = date('Y-m-d',$time);
        $jobId = job_Id($id++);
        $jobName = job_name();
        $jobCategory = category();
        $jobLocation = job_location();
        echo $jobId."   ".$jobName;
        $query = "INSERT INTO jobs(`jobId`, `jobName`, `jobCategory`, `jobLocation`, `lastDate`,`isAvailable`) VALUES('$jobId','$jobName','$jobCategory','$jobLocation','$newformat','YES')";
        if(!mysqli_query($conn, $query))
            echo mysqli_error($conn);
    }
?>
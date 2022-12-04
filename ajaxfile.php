<?php 

include "config.php";

// Read POST data
$data = json_decode(file_get_contents("php://input"));

if(isset($data->username)){
    $username = mysqli_real_escape_string($con,$data->username);
   
    $query = "select count(*) as cntUser from users where username='".$username."'";
    
    $result = mysqli_query($con,$query);
    $response = "<span style='color: green;'>Username is Available.</span>";
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);
    
        $count = $row['cntUser'];
        
        if($count > 0){
            $response = "<span style='color: red;'>Username is Not Available.</span>";
        }
       
    }
    echo $response;
}
<?php   
 include 'dbCon.php';  
 error_reporting(0);
 
     $user_id = $_GET['id'];  
     $query="UPDATE bookings SET user_id='',payment_status='' WHERE user_id = '$user_id'";
	 $data=mysqli_query($conn,$query);

      if ($data) {  
           header('location:customerss.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }   
 ?>  
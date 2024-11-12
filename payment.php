
<?php   
 include 'dbCon.php';  
 error_reporting(0);
 
     $user_id = $_GET['id'];  
     $query="UPDATE bookings SET due_from=DATE_ADD(due_from, INTERVAL 1 MONTH),payment_status='' where user_id = '$user_id'";
	 $data=mysqli_query($conn,$query);

     if($data){
        header('location:customerss.php');
     }
     else{
        echo "Error: ".mysqli_error($conn);  
     }

 ?>  
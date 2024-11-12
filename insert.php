<?php 


 $conn= new mysqli('localhost','root','','rental');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
	$DOB = $_POST['DOB'];
	$email = $_POST['email'];
    $phn = $_POST['phn'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
    $proof = $_POST['proof'];
	$aadhar = $_POST['aadhar'];
    $password = $_POST['password'];

    
    $phn = mysqli_real_escape_string($conn,$_POST['phn']);
    $aadhar = mysqli_real_escape_string($conn,$_POST['aadhar']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = mysqli_query($conn,"select * from customer where phn='$phn' || aadhar='$aadhar'|| email='$email' || password='$password'");
    $num=mysqli_num_rows($sql);
  if ($num<1){
    if($conn){
        $sql = "INSERT  INTO customer(id, name, DOB, email,phn,gender,address,aadhar,proof,password)  VALUES('0', '$name', '$DOB', '$email','$phn','$gender','$address','$aadhar','$proof','$password')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "YOU'RE SUCCESSFULLY SIGNED IN GO TO LOG IN PAGE";
            header("location:log.php");
        }
        else{
            die(mysqli_error($conn));
        }
    }
    else{
        die(mysqli_error($conn));
    }
  }
  else{
    header("location:signin.php");
    echo "Your details already entered !";
  }
    


}



?>


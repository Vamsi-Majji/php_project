<?php
include('dbCon.php');

if (!isset($_SESSION['USER_ID'])) {
	header("location:log.php");
	die();
}


$user = $_SESSION['UNSER_NAME'];
$query = mysqli_query($conn,"select * from customer where email = '$user'");
$rowr =mysqli_fetch_array($query);
$id = $rowr['id'];


$query1 = mysqli_query($conn,"SELECT customer.name,bookings.bike,bookings.rent,bookings.date_of_booking,bookings.due_from,CURRENT_DATE(),(datediff(CURRENT_DATE(),due_from)/30)*rent as due,(CASE WHEN ((datediff(CURRENT_DATE(),due_from)/30)*rent)>=rent THEN 'You have due' else 'Your bill is running'END) as bill_status,bookings.payment_status,bookings.Do_you_want_to_Return,bookings.user_id FROM bookings JOIN customer ON bookings.user_id=customer.id where user_id = '$id'");
$result = mysqli_num_rows($query1);


 
if (isset($_POST['pay'])) {
	mysqli_query($conn,"UPDATE bookings SET payment_status='Payment over' where user_id = '$id'");
	header("location:view_order.php");
}

if (isset($_POST['Return'])) {
	mysqli_query($conn,"UPDATE bookings SET Do_you_want_to_Return='Yes,I Want To Return The Bike.' where user_id = '$id'");
	header("location:view_order.php");
}

 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        body {
          background-image: url("img/u.gif");
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
        }
        @media screen and (max-width: 600px) {
          .column {
            width: 100%;
            height: auto;
          }
        }
		a img{
          width: 100%;
            height: 100%;
        }
        button{
          display: inline-block;
        }
        .navbar-brand{
          width: 5%;
            height:50%;
            background-size: 10%;
        }
    
		table{
			background-color:aqua;
		}
		footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: rgb(4, 255, 0);
          color: white;
          text-align: center;
        }


        </style>

 </head>
 <body>
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid bg-dark">
    <a class="navbar-brand" href="home.php"><img src="img/logoo.jpg"></a>
    <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">Bikes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login/Signin
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="log.php">Login</a></li>
            <li><a class="dropdown-item" href="signin.php">Signin</a></li>
            <li><a class="dropdown-item" href="admin.php">Admin</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_order.php">View Order</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	
	<center>
	<h1>Your Orders</h1>
</center>
<hr>
<center>
 <br><br>


 <table  border="1px" class="table table-hover">
 	<tr>
	    <td scope="col">Name</td>
 		<td scope="col">Bike</td>
 		<td scope="col">Rent</td>
		<td scope="col">Booking Time</td>
 		<td scope="col">Due from</td>
 		<td scope="col">Due</td>
     <td scope="col">Bill status</td>
		<td scope="col">Payment status</td>
 		<td scope="col">Return Decision</td>
		<td scope="col">User ID</td>
 		<td scope="col">Payment</td>
		<td scope="col">Return</td>
 	</tr>

 	<?php 
    for($i=1; $i<=$result;$i++)
{
     $row =  mysqli_fetch_array($query1)
 	?>



 	<tr>
	    <td scope="row"><?php  echo $row['name']?></td>
 		<td scope="row"><?php  echo $row['bike']?></td>
 		<td scope="row"><?php  echo $row['rent']?></td>
		<td scope="row"><?php  echo $row['date_of_booking']?></td>
 		<td scope="row"><?php  echo $row['due_from']?></td>
		<td scope="row"><?php  echo $row['due']?></td>
    <td scope="row"><?php  echo $row['bill_status']?></td>
 		<td scope="row"><?php  echo $row['payment_status']?></td>
 		<td scope="row"><?php  echo $row['Do_you_want_to_Return']?></td>
 		<td scope="row"><?php  echo $row['user_id']?></td>
 		<td scope="row"><form action="" method="post">
			<button type="submit" class="btn btn-primary" name="pay" id="pay" value="<?php$row[id];?>">PAY</button></form></td>
		<td scope="row">
		<form action="" method="post"><button type="submit" class="btn btn-warning" name="Return" id="Return" value="<?php$row[id];?>">Return</button></form>
	    </td>
 	</tr>
	 <?php } ?> 
 </table>

	</center>
	<footer>
            &copy;VAMSI MAJJI(vamsimajji483@gmail.com)
         </footer>
</body>
 
</html>
 
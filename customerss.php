<?php   
 include 'dbCon.php';  
 $query = "SELECT customer.name,bookings.bike,bookings.rent,bookings.date_of_booking,bookings.due_from,CURRENT_DATE(),(datediff(CURRENT_DATE(),due_from)/30)*rent as due,(CASE WHEN ((datediff(CURRENT_DATE(),due_from)/30)*rent)>=rent THEN 'You have due' else 'Your bill is running'END) as bill_status,bookings.payment_status,bookings.Do_you_want_to_Return,bookings.user_id FROM bookings JOIN customer ON bookings.user_id=customer.id";  
 $run = mysqli_query($conn,$query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
 <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        body {
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
        footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: rgb(17, 255, 0);
          color: white;
          text-align: center;
        }
        table{
          margin-top: 95px;
          margin-bottom: 20px;
        }

        </style>
      <meta charset="utf-8">  
      <title>Customerss</title>  
      <link rel="stylesheet" type="text/css" href="style.css">  
 </head>  
 <body>  
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
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
 <header></header>  
 <table border="1" cellspacing="0" cellpadding="0">  
      <tr class="heading">  
	       <th>S no.</th> 
           <th>Name</th>  
           <th>Bike</th>  
           <th>Rent</th>  
           <th>Booking Time</th>  
           <th>Due from</th>  
           <th>Due</th>  
           <th>Bill Status</th> 
           <th>Payment status</th>  
           <th>Return Decision</th>  
		   <th>User ID</th>  
           <th>Payment over</th>  
           <th>Returned</th>  
           
      </tr>  
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                          <td>".$i++."</td>  
                               <td>".$result['name']."</td>  
                               <td>".$result['bike']."</td>  
                               <td>".$result['rent']."</td>  
                               <td>".$result['date_of_booking']."</td>  
                               <td>".$result['due_from']."</td>  
                               <td>".$result['due']."</td> 
                               <td>".$result['bill_status']."</td> 
							                 <td>".$result['payment_status']."</td>  
                               <td>".$result['Do_you_want_to_Return']."</td>  
                               <td>".$result['user_id']."</td>  
							   
                               <td><a href='payment.php?id=$result[user_id]' id='btn1'>paid</a></td>
							                 <td><a href='returned.php?id=$result[user_id]' id='btn2'>Returned</a></td> 
                 
                          </tr>  
                          
                     ";  
                }  
           }  
      ?>  
      <footer>
            <span>&copy;VAMSI MAJJI(vamsimajji483@gmail.com)</span>
         </footer>
      
 </table>  
 
 </body>  
 </html>  
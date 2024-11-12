<?php
include('dbCon.php');

if (!isset($_SESSION['USER_ID'])) {
	header("location:log.php");
	die();
}
 ?>

<?php 

$user = $_SESSION['UNSER_NAME'];
$query = mysqli_query($conn,"select * from customer where email = '$user'");
$row =mysqli_fetch_array($query);
$id = $row['id'];

/*echo "$id";*/

 if (isset($_REQUEST['submit'])) 
 {
 	$bike =   $_REQUEST['bike'];
 	$rent = $_REQUEST['rent'];
    $date = date('Y-m-d');


    $sql = mysqli_query($conn,"select * from bookings where user_id='$id'");
    $num=mysqli_num_rows($sql);
  if ($num<1){
    mysqli_query($conn,"insert into bookings(bike,rent,date_of_booking,due_from,user_id)value('$bike','$rent',CURRENT_DATE(),CURRENT_DATE(),'$id')");

  }
  else{
    echo "<h2>You already booked a bike !</h2>";
  }
 }

 if (isset($_REQUEST['view'])) {
    header("location:view_order.php");
 }

 if (isset($_REQUEST['v'])) {
    echo "hii";
 }

?>



<!DOCTYPE html>
<html>
    <head>
        
      <script>
         function bikerate(val) {
            var t = val;
            if(t=='Xl100'){
                document.getElementById("rent").value="2000";

            }
            else if(t=='Splendor'){
                document.getElementById("rent").value="2300";

            }
            else if(t=='Shine'){
                document.getElementById("rent").value="2500";

            }
            else if(t=='Activa'){
                document.getElementById("rent").value="2800";

            }
            else if(t=='Ct100'){
                document.getElementById("rent").value="2900";

            }
            else if(t=='Passion'){
                document.getElementById("rent").value="3000";

            }
            else if(t=='Sp125'){
                document.getElementById("rent").value="3400";

            }
            else if(t=='Discover125'){
                document.getElementById("rent").value="3500";

            }
            else if(t=='Glamour'){
                document.getElementById("rent").value="3600";

            }
            else if(t=='Vespa'){
                document.getElementById("rent").value="3200";

            }
            else if(t=='Dio'){
                document.getElementById("rent").value="3100";

            }
            else if(t=='RTR160'){
                document.getElementById("rent").value="3800";

            }
            else if(t=='Pulsar150'){
                document.getElementById("rent").value="4500";

            }
            else if(t=='Hornet'){
                document.getElementById("rent").value="4700";

            }
            else if(t=='Ns200'){
                document.getElementById("rent").value="5000";

            }
            else if(t=='R15'){
                document.getElementById("rent").value="5500";

            }
            else if(t=='Mt15'){
                document.getElementById("rent").value="5600";

            }
            else if(t=='Classic350'){
                document.getElementById("rent").value="5800";

            }
            else if(t=='Hunter350'){
                document.getElementById("rent").value="5200";

            }
            else if(t=='Himalayan'){
                document.getElementById("rent").value="6000";

            }
            else {
                document.getElementById("rent").value="Select the listed bike ";

            }
            
            
         } 
        </script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        body {
          background-image: url("img/w.gif");
          background-color:aliceblue;
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
        h2{
          background-color:red;
        }
        button{
          display: inline-block;
        }
        .navbar-brand{
          width: 5%;
            height:50%;
            background-size: 10%;
        }
    
        .vie{
            text-decoration: none;
        }
        .col p{
            margin:0px auto; 
            width:70%;
            max-width:200px;
            height: 208px; /* I need to give heigt to make it visible? */
	        overflow: scroll;
	        margin-top: 4%;
            margin-left: 15%;
	        color: rgb(6, 111, 231);
	        font-family:melted-monster ;
            text-align: justify;
            border:solid;
            border-color: red;
            background-color: rgb(250, 249, 243);
            position: relative;
        }
        .b::-webkit-scrollbar {
            display: none;
        }
        .col{
            justify-content: center;
            align-items: center;
        }
        footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: rgb(0, 255, 0);
          color: white;
          text-align: center;
        }
        form{
          background-color: aliceblue;
          width: 15% ;
        }
        .container-fluid{
          background-color: antiquewhite;

        }
        h1{
          background-color: whitesmoke;
          margin-left: 400px;
          margin-right: 400px;
        }



        </style>

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

        <h1> <center> Welcome <?php echo $_SESSION['UNSER_NAME'] ?></h1></center> 


<center>
<form action="#" method="REQUEST">
  <label for="bike">Select A Bike:</label><br><br>
  <select name="bike" onchange="bikerate(this.value)" id="bike">
            <option></option>
            <option>Xl100</option>
            <option>Splendor</option>
            <option>Shine</option>
            <option>Activa</option>
            <option>Ct100</option>
            <option>Passion</option>
            <option>Sp125</option>
            <option>Discover125</option>
            <option>Glamour</option>
            <option>Vespa</option>
            <option>Dio</option>
            <option>RTR160</option>
            <option>Pulsar150</option>
            <option>Hornet</option>
            <option>Ns200</option>
            <option>R15</option>
            <option>Mt15</option>
            <option>Classic350</option>
            <option>Hunter350</option>
            <option>Himalayan</option>            
          </select>
          <br><br>
    <label for="rent">Rent:</label><br><br>
    <input type="text" name="rent" id="rent">
     <br>
     <br>
  <input type="submit"  name="submit"  value="Submit">
  <input type="submit"  name="view"  value="View Order">
  <div class="col b">
    <p>Note:<br>
        1. Select a bike which was shown in the list<br>
        2. Pay the rent which was shown under the bike name<br>
        3. User can book only one time.<br>
        4. If user want to book another bike Return the pevious bike which was booked in this app.<br> 
      </p>
  </div>
</form> 



 </center>
 <footer>
    <span>&copy;VAMSI MAJJI(vamsimajji483@gmail.com)</span>
 </footer>
    </body>
</html>
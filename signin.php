


<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .label{
            color: red;

        }
        body{
            background-color: aliceblue;
        }
        .vv{
          background-image: url('img/lv.jpg');
          background-repeat: no-repeat;
          background-size: cover;
            background-position: center;
            display:flex;

        }
        form{
            
            text-shadow: 0cqmax;
            
            margin-top: 30px;
           
            align-items:center;
            justify-content:center;
            height:100vh;
            margin-left: 900px;
        }
        @media screen and (max-width: 600px) {
          .column {
            width: 100%;
            height: auto;
          }
        }
        label{
          
          color: rgb(250, 246, 242);
        }
        input{
          color: rgb(60, 104, 235);
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
        .col p{
            margin:0px auto; 
            width:60%;
            max-width:250px;
            height: 208px; /* I need to give heigt to make it visible? */
	        overflow: scroll;
	        margin-top: 30%;
            
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
          background-color: rgb(9, 255, 0);
          color: white;
          text-align: center;
        }
    


        </style>

        <script>
        function checkEmail() {
            var email = document.getElementById('email');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email.value)) {
                alert('Please provide a valid email address');
                email.focus;
                return false;
            }
        
        }




        function show() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        if ($(".phn").val() == "") {
            error = "Please enter phone number";
        } 
        else if (!($.isNumeric($(".phn").val())) && $(".phn").val() != "") {
            error = "this field cannot contain letters";
        } else if ($(".phn").val().length !== 10) {
            error = "Must be 10 Digits";
        } else {
             error = "";
        }
        console.log(error);
         

        if ($(".aadhar").val() == "") {
            err = "Please enter AADHAR number";
        } 
        else if (!($.isNumeric($(".aadhar").val())) && $(".aadhar").val() != "") {
            err = "this field cannot contain letters";
        } else if ($(".aadhar").val().length !== 12) {
            err = "Must be 12 Digits";
        } else {
             err = "";
        }
        console.log(error);


        function validateEmail(email) {
            const res = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            return res.test(String(email).toLowerCase());
        }

        
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
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
<div class="vv">
     
        <form action="insert.php" method="post">
        <div class="form-group">
        
              <label for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <br><br>
            
                <label for="DOB">Date of Birth</label>
                <input type="date" name="DOB" id="DOB" required>
            <br><br>
            
                <label for="gender" textprimary>Gender</label>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="Other">Others
            <br><br>
            
                <label for="phn">Phone Number</label>
                <input type="text" name="phn" pattern="[6789][0-9]{9}" id="phn" placeholder="Enter phone number" required>
            <br><br>
            
                <label for="email">Email</label>
                <input type="email"  name="email" id="email" placeholder="Enter email" required>
            <br><br>
            
                <label for="address">Address</label>
                <input type="textarea" name="address" id="address"  placeholder="Enter address" required>
              <br><br>
            <br><br>
                <label for="aadhar">AADHAR</label>
                <input type="text"  name="aadhar" id="aadhar" minlength="12" placeholder="Enter aadhar number" required>
            <br><br>
            
                <label for="proof">Proof</label>
                <input type="file" name="proof" id="proof" required>
            <br><br>
                      
            
              <label for="exampleInputPassword1">Password</label>
               <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8"  id="pass" required><br><br>
               <input type="checkbox" onclick="show()"><label>Show Password</label>
            <br><br>
            <button type="submit" onclick='checkEmail();'>Submit</button>
        </div>




       
        </form>
        <div class="col b">
            <p>Note:<br>
                1. Enter your details<br>
                2. Password must contain greater than 8, atleast one symbol, one number digit  and one capital letter.<br>
                3. User can Signin only one time.<br>
                4. If all the details are entered perfectly then it will move to Login page.<br>
              </p>
          </div>
    </div>
     <footer>
        <span>&copy;VAMSI MAJJI(vamsimajji483@gmail.com)</span>
     </footer>
    </body>
</html>
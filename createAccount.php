<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Student ID: 105076627
Due: August 4th, 2021
create account page 
-->       
<!-- (c) 2021 Shane Tracey. All Rights Reserved. -->    
    
<head>
<meta charset="utf-8">
<meta name="author" content="Shane Tracey">
<meta name="keywords" content="html, forms, education, assignment">
<meta name="description" content="Final project of Advanced Website Design">
<meta name="viewport" content= "width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css">

<title> Create an Account </title>
    
</head>

<body>
    
<!--headers -->
<div class="headers">
<img id="h_logo" src="images/AWD_fp_2.png" alt="Gains Tracker Logo">
<h3 id="h_text">Record your workouts <br> See your progress <br> watch yourself get big!</h3>
</div>
<script src="js/index.js" type="text/javascript"></script>
<!-- </form> -->    
<form class="forms" onsubmit="return formVerification()" method ="post" action ="createAccount.php">
<div class="buttons">
<!-- <h1 id="sign_in_header">Sign in </h1> -->
</div>
<br>

<!-- First name text box -->
<div id="fnd">
<input type="text" value="" id="fn" name="fn" placeholder="Enter First Name" required>
<label for="fn" class="required"></label>
</div>
<br>
<br>
<!-- Last name text box -->
<div id="lnd">
<input type="text" value="" id="ln" name="ln" placeholder="Enter Last Name" required>
<label for="ln" class="required"></label>
</div>
<br>
<br>
<!-- Age text box -->
<div id="aged">
<input type="text" value="" id="age" name="age" placeholder="Enter Age" required>
<label for="age" class="required"></label>
</div>
<br>
<br>
<!-- E-mail text box -->
<div id="emaild">
<input type="email" value="" id="email" name="email" placeholder="Enter E-mail" required>
<label for="email" class="required"></label>
</div>
<br>
<br>

<!-- User name text box -->
<div id="usernamedca">
<input type="text" value="" id="usernameca" name="usernameca" placeholder="Username"required>
<label for="usernameca" class="required"></label>
</div>
<br>
<br>

<!-- password text box -->
<div id="pwdca"> 
<input type="password" value="" id="pwca" name="pwca" placeholder="Password" required>
<label for="pwca" class="required"></label>
</div> 
<br>

<!-- password confirm text box -->
<div id="pwcd">
<input type="password" value="" id="pwc" name="pwc" placeholder="Confirm Password" required>
<label for="pwc" class="required"></label>
</div>
<br>
<br>

<!-- submit button -->
<div class="fpd">
<input type="submit" id="submit" value="Sign Up">
</div>
<br>

<div class="buttons">
</div>

</form>
<br>


<?php
//variables 

/* Connecting to DB */
$servername = "localhost";
$usernamedb = "traceyu_awd"; 
$passworddb= "awdfinalp";
$dbname = "traceyu_awdfinalp";

//form has successfully been submitted
if(!empty($_POST["fn"]))
{
    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    // don't need age input for DB 
    $username = $_POST["usernameca"];
    $email = $_POST["email"];
    $pwph = $_POST["pwc"]; //used only from password confirm (used to be $pw)

    //hashes password
    $pw = password_hash($pwph, PASSWORD_DEFAULT);

    $db_status;
    $db_update;

// Create connection
$conn = new mysqli($servername, $usernamedb, $passworddb, $dbname);

// Check connection
if ($conn->connect_error) {
  $db_status = "Failed";
  die("Connection failed: " . $conn->connect_error);
} 
$db_status = "Successful";
/* end of DB connection */


$sql = "SELECT userName FROM User WHERE userName='$username'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    echo "<div class='headers'><h3 id='h_text'>That Username has already been taken. Please enter another one.</h3></div>";
  
    exit();
    }

/* insert form data into DB */
$sql = "INSERT INTO User (firstName, lastName, email, userName, pw) VALUES ('$fname', '$lname', '$email','$username','$pw');";

if ($conn->query($sql) === TRUE) {
  $db_update ="New records created successfully";
  } else {
    $db_update ="Error: " . $sql . "<br>" . $conn->error;
  }

  //echo "<div class='account_info'><h3>Account Info</h3><br>";
  //echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br>Name: ".$fname." ".$lname."<br>Email: " .$email."<br>username: ".$username."<br>Password: ".$pw. "</h2></div><br>";
  
  echo "<div class='headers'><h3 id='h_text'>Your account has successfully been created!</h3></div>";
  echo "<script>function signIn() { window.location.href = 'index.php';}</script>";
  echo "<br><div class='fpd'><button id='ca' onclick='signIn()' type='button'> Sign in</button></div><br>";
  /* closing DB connection */
$conn->close();

}

?>
<script src="js/index.js" type="text/javascript"></script>
<style>
    /* making site responsive for mobile phones */
    @media only screen and (max-width: 768px) 
    {
    /* For mobile phones: */
    .forms {
      width: 92%;
    }
    #fnd, #lnd, #emaild, #pwcd, #pwdca, #aged, #usernamedca {
        width: 100%;
        margin: auto;
        text-align: center;
   
    }
    input [type=text], input [type=email], input [type=password] {
      width: 100%;
      margin: 0%;
      font-size: 1vw;
    }
    .required{
      width: 0%;
     }
  }
  </style>
</body>
    
</html>
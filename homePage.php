<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 4th, 2021
home page (signed in) 
-->       
<!-- (c) 2021 Shane Tracey. All Rights Reserved. -->    
    
<head>
<meta charset="utf-8">
<meta name="author" content="Shane Tracey">
<meta name="keywords" content="html, forms, education, assignment">
<meta name="description" content="Final project of Advanced Website Design">
<meta name="viewport" content= "width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js" type="text/javascript"></script>
<title> Gains Tracker </title>
    
</head>

<body>
    
    <?php 

    $username = "";

    if (!empty($_POST["username"]))
    {
    $username = $_POST["username"]; // make index.php sign in form action to homePage.php (this form)
  }
  else
  {
    header("Location:index.php");
    exit();
  }
//$username = "shaner"; 
$quote = "Dreams don't work unless you do!";
 ?>
<!-- Page menu bar-->
<div class="main_header">
<!-- might have to pass userName to each page once logged in -->
    <img id="h_logo_header" src="images/AWD_fp_1.png" alt="Gains Tracker Logo">
    <button id="sign_out_button" onclick="location.href='index.php'" type="button"> Sign Out </button>
  <form id="help_buttonf" method="post" action="help.php">
  <input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
  <button id="help_button" type="submit"> Help </button>
  </form>
  <form id="about_buttonf"method="post" action="about.php">
  <input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
  <button id="about_button" type="submit"> About </button>
  </form>
  <form id="home_buttonf" method="post" action="homePage.php">
  <input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
  <button id="home_button" type="submit"> Home </button>
  </form>
  
  </div>

<!--headers -->
<div class="headers">
    <h3 id="h_text2">Hello, <?php echo " ".$username."!" ?></h3>
    <h3 id="h_text"> <?php echo $quote ?></h3>
    </div>
    <br>
<div class="home_page_buttons">
<form method="post" action="beginWorkout.php">
<div class="homepage_buttons">
<input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
<button id="hpb" type="submit"> Begin Workout</button>
</div> 
</form>
<form method="post" action="goals.php">
<div class="homepage_buttons">
<input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
<button id="hpb" type="submit"> Goals</button>
</div> 
</form>
<form method="post" action="personalBest.php">
<div class="homepage_buttons">
<input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
<button id="hpb" type="submit"> Personal Bests</button>
</div> 
</form>
<form method="post" action="previousWorkouts.php">
<div class="homepage_buttons">
<input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
<button id="hpb" type="submit"> Previous Workouts</button>
</div> 
</form>
<form method="post" action="progress.php">
<div class="homepage_buttons">
<input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
<button id="hpb" type="submit"> Progress</button>
</div> 
</form>
</div> 


<!--
php
//variables 

/* Connecting to DB */
$servername = "localhost";
//$usernamedb = *insert username for database*; 
//$passworddb = *insert password for database*;
//$dbname = *insert name of database*;

//form has successfully been submitted
if(!empty($_POST["fn"]))
{
    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    //DOB
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    //
    $gender = $_POST["gender"];
    $country = $_POST["ctry"];
    $email = $_POST["email"];
    $phone = $_POST["ph"];
    $pw = $_POST["pwc"]; //used only password confirm

    $db_status;
    $db_update;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  $db_status = "Failed";
  die("Connection failed: " . $conn->connect_error);
} 
$db_status = "Successful";
/* end of DB connection */

/* insert form data into DB */
$sql = "INSERT INTO personal_info (fname, lname, dob_day, dob_month, dob_year, gender, country, email, phone, pw) VALUES ('$fname', '$lname', '$day','$month','$year','$gender','$country','$email','$phone','$pw');";

if ($conn->query($sql) === TRUE) {
  $db_update ="New records created successfully";
  } else {
    $db_update ="Error: " . $sql . "<br>" . $conn->error;
  }
/*
  echo "<div class='account_info'><h3>Account Info</h3><br>";
  echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br>Name: ".$fname." ".$lname."<br>Email: " .$email."<br>DoB: ".$day." ".$month." ".$year."<br>Password: ".$pw. "</h2></div><br>";
  */
  /* closing DB connection */
$conn->close();

}
//form hasn't been successfully been submitted
else
{
}

?>
-->
</body>
    
</html>

<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Student ID: 105076627
Due: August 4th, 2021
landing page 
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
    
<!--headers -->
<div class="headers">
<img id="h_logo" src="images/AWD_fp_2.png" alt="Gains Tracker Logo">
<h3 id="h_text">Record your workouts <br> See your progress <br> watch yourself get big!</h3>
</div>

<!-- </form> -->    
<form class="forms" onsubmit="return formVerification()" method ="post" action="index.php"> <!-- got rid of target & action -->
<div class="buttons">
<!-- <h1 id="sign_in_header">Sign in </h1> -->
</div>
<br>

<!-- error message  (still testing it)-->
<div id="e_message_indexd">
<p id="e_message_index"> <?php echo $_POST["herror"]; ?></p>
</div>

<!-- User name text box -->
<div id="usernamed">
<input type="text" value="" id="username" name="username" placeholder="Username"required>
</div>
<br>
<br>

<!-- password text box -->
<div id="pwd"> 
<input type="password" value="" id="pw" name="pw" placeholder="Password" required>
</div> 
<br>
<div id="herrord"> 
<input type="hidden" value="<?php echo $e_message; ?>" id="herror" name="herror">
</div> 
<br>
<!-- submit button -->
<div class="fpd">
<input type="submit" id="submit" value="Sign In">
</div>

<!-- forgot your password button 
<div class="fpd">
<button id="fp" type="submit" name="fp" id="fp"> Forgot Password</button>
</div>
-->
<!-- create account button -->
<div class="fpd">
<button id="ca" onclick="location.href='createAccount.php'" type="button"> Create Account</button>
</div> 
<br>

<div class="buttons">
</div>

</form>
<br>
<div class="fpd">
<button id="ca" onclick="location.href='learnMore.html'" type="button"> Learn More</button>
</div> 

<!-- temporary for testing -->
<br>

<?php
//variables 

/* Connecting to DB */
$servername = "localhost";
$usernamedb = "traceyu_awd"; 
$passworddb = "awdfinalp";
$dbname = "traceyu_awdfinalp";

$e_message="";

//form has successfully been submitted
if(!empty($_POST["username"]))
{
    $username = $_POST["username"];
    $password = $_POST["pw"]; // duplicate elememts with id='pw'
    
    $e_message = $_POST["herror"];
  
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


$pw_check = "";
/* fetching from database  */
$sql = "SELECT pw FROM User WHERE userName='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) 
    {
      // for testing echo "<br><p> ".$row["pw"]." is the password</p><br>";
    $hashed_password = $row["pw"];
    /*   
    old values
    $pw_check = $row["pw"];   
      if($password == $pw_check)
    */

    if(password_verify($password, $hashed_password))
      {
        $e_message="Good login!";
        echo "<br><p>Good login!</p><br>";
        echo "<form id='sign_in_form'method='post' action='homePage.php'>";
        echo "<input name='username' id='username' type=hidden value='". $username . "'>";
        echo "<input type='submit' value='submit'>";
        echo "</form>";
        echo "<script> document.getElementById('sign_in_form').submit(); </script>";

      }
      else
      {
        $e_message="Incorrect Password";
        echo "<br><p class='default_content'>Incorrect Password</p><br>";
      }

    }
  }
else 
{
  $e_message="This user doens't exist";
  echo "<br><p class='default_content'>This user doens't exist</p><br>";

}

  /* closing DB connection */
$conn->close();
}
?>


</body>
    
</html>

<!-- project idea 
Workout tracker website
Name: Gains Tracker
Use cases:
keep track of an individual workout (sets/reps/weight/duration)
keep track of all workouts (cardio, strength, )
a way to see progress progressive overload training


Big ideas:
share workouts ?
pre set workouts to choose from









-->
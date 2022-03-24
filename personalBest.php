<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 4th, 2021
Personal Bests Page
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
<h3 id="h_text2">Personal Bests</h3>
    <h3 id="h_text">Look at You Go! </h3>
    </div>
<?php

/* Connecting to DB */
$servername = "localhost";
//$usernamedb = *insert username for database*; 
//$passworddb = *insert password for database*;
//$dbname = *insert name of database*;

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

echo"<h2 class='default_header'>Cardio</h2>";

  $t_arr = array('running', 'walking', 'swimming', 'cycling', 'elliptical');
  $cid_arr = array(); // array for cid's 
  $eid_arr = array(); // array for eid's
  
  /* Get all cid's for user and add to array */
  $sql = "SELECT cID, eID FROM Workout WHERE userName='$username'";
    $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) 
      {
        array_push($cid_arr, $row["cID"]); //(be careful for null cid's)
        array_push($eid_arr, $row["eID"]);
    }

  }
  $cid_arr = array_filter($cid_arr);
  $cid_arr = array_values($cid_arr);
  // for testing print_r($cid_arr);
  if (empty($cid_arr))
  {
    echo "<p>No cardio records</p>";
  }
  else{
  for ($count= 0; $count < count($t_arr); $count++) // loops through each type of cardio
  { 
    /* dynamically creates sql query for max duration and max distance for each type of cardio  */
    $sql = "SELECT MAX(distance), MAX(duration) FROM Cardio WHERE ctype='$t_arr[$count]' AND (";

    for($count2= 0; $count2 < count($cid_arr); $count2++) //adds all cardios of specific type to query
    {
      if($cid_arr[$count2] == NULL)
      {
        // do nothing
      }
      else
      {
          if($count2 == 0) // first cardio
          {
            $sql = $sql." cID='$cid_arr[$count2]'";
          }
          else
          {
        $sql = $sql." OR cID='$cid_arr[$count2]'";
          }
      }
      
    }
   $sql = $sql." )";
   $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) //shouldn't loop
      {
        if($row["MAX(distance)"] == "")
        {
          // do nothing
        }
        else{
          echo "<h2 class='default_header'>".$t_arr[$count]."</h2>";
          echo "<p class='default_content'>Distance: ".$row["MAX(distance)"]."km  Duration: ".$row["MAX(duration)"]."</p>";
        }
    }

  }
    else
    {
      echo "<p class='default_content'> No Dice</p>";
    //do nothing
    }

}
  }
?>




<h2 class="default_header">Exercises</h2>
<?php
/*  Logic
ideas:
dynamically name arrays 
add weights to array and get max

one big array odd is name even is weight 
multipdeimensional array

*/
//class made to make sorting easier
class Name_weight
{
  public ?string $ename;
  public int $eweight;

  public function __construct(?string $ename, int $eweight )
    {
        $this->ename = $ename;
        $this->eweight = $eweight;
    }
}


$big_arr = array(array()); // 2d array of objects

for ($count= 0; $count < count($eid_arr); $count++) // loops through each exercise
  { 
$sql = "SELECT ename, eweight FROM Exercise WHERE eID='$eid_arr[$count]'";
    $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) 
      {
        
        if($count == 0) // first exercise 
        {
        
        $obj = new Name_weight ($row["ename"], $row["eweight"]);
        $big_arr [0][0] = $obj;
        //echo "<p>Name: ".$big_arr[0][0]->ename." Weight: ".$big_arr[0][0]->eweight."</p>";
        }
        else // nth exercise
        {
        $obj = new Name_weight ($row["ename"], $row["eweight"]);
        $size_ba = count($big_arr);
          $checker = 0;
          for($count2 = 0; $count2 < $size_ba; $count2++ ) // loops through 2D array
          {
        
          if($obj->ename == $big_arr[$count2][0]->ename) //finds exercise with same name already in array
            {
              
              $arr2 = $big_arr[$count2];
              $big_arr [$count2][count($arr2)] = $obj; // gets index where i need to add object and adds it to array
              // for testing echo "<p> (Tally) Name: ".$big_arr [$count2][count($arr2)]->ename." Weight: ".$big_arr [$count2][count($arr2)]->eweight."</p>";
              $checker = 1;
            }
         
          }
          if($checker == 0) // doesn't find exercise with same name in list yet
          {
            $big_arr[$size_ba][0] = $obj; // adds object to beginning of new array
              // for testing echo "<p>(new array)Name: ".$big_arr[$size_ba][0]->ename." Weight: ".$big_arr[$size_ba][0]->eweight."</p>";
            }
        }
          
        
    }


  }
  
  }
  
//compare function used in usort
function cmp($a, $b) {
  return strcmp($b->eweight,$a->eweight);
}
// prints to screen the PB's
if(!empty($big_arr[0]))
{
for ($count = 0; $count < count($big_arr); $count++) // loops through each exercise and prints the heaviest weight
  { 
    $arr2 =$big_arr[$count];
    usort($arr2, "cmp"); // sorts by weight descending
    echo "<p class='default_content'>".$arr2[0]->ename.": ".$arr2[0]->eweight." lbs</p>";
  }
}
$conn->close();
?>
</body>
    
</html>

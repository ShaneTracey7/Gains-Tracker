<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 4th, 2021
Previous Workouts Page & modal
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
    <h3 id="h_text2">Previous Workouts</h3>
    <h3 id="h_text">It's a Blast From the Past! </h3>
    </div>

   

<?php
//variables 

/* Connecting to DB */
$servername = "localhost";
//$usernamedb = *insert username for database*; 
//$passworddb = *insert password for database*;
//$dbname = *insert name of database*;

$wids = array();
$cids = array();
$eids = array();
$len = -1; 
// Create connection
$conn = new mysqli($servername, $usernamedb, $passworddb, $dbname);

// Check connection
if ($conn->connect_error) {
  $db_status = "Failed";
  die("Connection failed: " . $conn->connect_error);
} 
$db_status = "Successful";
/* end of DB connection */

/* logic for workouts list

i want to display wtype, location, startTime, Duration(endtime-startTime), and  Date
I can get it all from WorkoutInfo 
DB access:
Workout(find all occurances of username (only select first occurance of wID))
loop
WorkoutInfo (from that array of wID)
display to screen with onclick {button}
}

logic for modal 
info to show:
all of :workout info, cardio, and each exercise

*/

/* getting ID's for Cardio, WorkoutInfo, and Exercise tables  */
$sql = "SELECT wID, cID, eID FROM Workout WHERE userName='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) 
    {
      
         array_push($wids,$row["wID"]);
         array_push($cids,$row["cID"]); // be careful cuz cardio is optional
         array_push($eids,$row["eID"]);
   
    }
    // ensures no duplicate values (wID and cID act similar)
    $wids = array_unique($wids); //with these 2 commented cardio is accurate but for each workout it shows each entry in workout in db
    $cids = array_unique($cids);
    $eids = array_unique($eids);
    $len = count($wids);
    $clen = count($cids);
    $elen = count($eids);

    
        $ctype = NULL;
        $distance = NULL;
        $cduration = NULL;

        $wids = array_values($wids); // needed to reindex arrays after array_unique function
        $cids = array_values($cids); // needed to reindex arrays after array_unique function
        //print_r($cids); //for testings
    echo "<div class='pwlist'><ul><li>Type</li><li>Location</li><li>Start Time</li><li>Duration</li><li>Date</li><li><!-- for button --></li></ul></div><br>";
    
    // loop to create each row & modal combo
for($count = 0; $count < $len; $count++)
{
    /* getting cardio info */
  $sql = "SELECT ctype, distance, duration FROM Cardio WHERE cID ='$cids[$count]'"; //less cid in cids array than for wid 
  //echo "cid count = ".$cids[$count]."<br>"; // testing
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  
    
    while($row = $result->fetch_assoc()) // this won't loop
      {
        $ctype = $row["ctype"];
        $distance = $row["distance"];
        $cduration = $row["duration"];
      }
    }
else
{
  // no cardio 
  $ctype = NULL;
  $distance = NULL;
  $cduration = NULL;
}

    /* getting Workout info */
$sql = "SELECT wtype, wdate, startTime, endTime, wlocation FROM WorkoutInfo WHERE wID ='$wids[$count]'";
//echo "wid count = ".$wids[$count]."<br>"; // testing
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  
  while($row = $result->fetch_assoc()) // this won't loop
    {
      
      $wtype = $row["wtype"];
      $wdate = $row["wdate"];
      $stime = $row["startTime"];
      $etime = $row["endTime"];
      $location = $row["wlocation"];
  
      $t1 = strtotime($stime);
      $t2 = strtotime($etime);
      $duration = ($t2 - $t1)/3600; // result in hours 
     
      echo "<div class='pwlist'><ul><li>".$wtype."</li><li>".$location."</li><li>".$stime."</li><li>".$duration."</li><li>".$wdate."</li><li><button id='v".$count."' class='default_button'>View</button></li></ul></div><br>";
    
      /* trying stuff */
      
      echo "<br>";
      echo "<!-- The Modal -->";
      echo "<div id='m".$count."' class='modal'>";

      echo "<!-- Modal content -->";
      echo "<div class='modal-content'>";
      echo "<button class='ebutton' id='b".$count."'> X </button>";
      echo "<h2>Workout</h2>";

      

      echo "<form method='post' action='previousWorkouts.php'>";
      
      //echo "<input type='text' value="" id='ename' name='ename' placeholder='Name'required><br><br>";
      echo "<h2> Workout Type ".$wtype." <br>Location ".$location." <br>Start Time ".$stime." <br>Duration ".$duration." <br>Location ".$wdate."</h2><br>";
 
      if(!$ctype == NULL)
      {
      echo "<h2> Cardio Type ".$ctype." <br>Distance ".$distance." <br>Duration ".$cduration."</h2>";
       }
       else
       {
        echo "<h2> Cardio is null </h2>";
       }
       
       echo "<h2 class='default_header'> Exercises </h2>";
       echo "<div class='table_bg2'>";
       echo "<table class='etable'>";
       echo "<tr><th>Exercise</th><th>Muscle</th><th>Weight(lbs)</th><th>Reps</th><th>Sets</th></tr>";
       
       /* getting exercise ID */
        $sql3 = "SELECT eID FROM Workout WHERE wID ='$wids[$count]'";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
        
          while($row3 = $result3->fetch_assoc()) // this should loop
            {
              
              $eidl = $row3["eID"];
              
              /* getting exercise info */
              $sql2 = "SELECT ename, muscle, eweight, esets, reps FROM Exercise WHERE eID ='$eidl'";

              $result2 = $conn->query($sql2);
              if ($result2->num_rows > 0) {
        
              while($row2 = $result2->fetch_assoc()) // this won't loop
              {
                $ename = $row2["ename"];
                $muscle = $row2["muscle"];
                $eweight = $row2["eweight"];
                $esets = $row2["esets"];
                $reps = $row2["reps"];

              echo "<tr><td>".$ename."</td><td>".$muscle."</td><td>".$eweight."</td><td>".$esets."</td><td>".$reps."</td></tr>";
              
              }
              

            }
            
            }
        }
      
       echo "</table></div>";
      
      echo "</form>";
      
      echo "</div>";
      echo "</div>";

    }
    
  }
else // this case should't happen
{
  $e_message="this case should't happen";
  echo "<br><p class='default_content'>this case should't happen</p><br>";

}
}

  }
else // user doesn't have any previous workouts
{
  $e_message="You have no previous workouts";
  echo "<br><p class='default_content'>You have no previous workouts</p><br>";

}

  /* closing DB connection */
$conn->close();
?>


<script>
const arr = []; // array 
const m_arr = []; // modal array 
const b_arr = []; // button array 
var len = <?php echo $len;?>;
// Get the button that closes

if(len == -1)
{
  //do nothing
}
else
{
  
var cbtn = document.getElementById("ebutton");
for(let count = 0; count < len; count++)
{
  m_arr.push(document.getElementById('m'+ count));
  arr.push(document.getElementById('v'+ count));
  b_arr.push(document.getElementById('b'+ count));
  // When the user clicks a workout's 'view' button, open the modal 
arr[count].onclick = function() {
  m_arr[count].style.display = "block";
}
  // When the user clicks on (x), close the modal
b_arr[count].onclick = function() {
  m_arr[count].style.display = "none";
}
  
}
}

</script>

</body>
    
</html>

<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 8th, 2021
Begin Workout Page & modal
-->       
<!-- (c) 2021 Shane Tracey. All Rights Reserved. -->    
    
<head>
<meta charset="utf-8">
<meta name="author" content="Shane Tracey">
<meta name="keywords" content="html, forms, education, assignment">
<meta name="description" content="Final project of Advanced Website Design">
<meta name="viewport" content= "width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js" type="text/javascript"></script> <!-- this might need to move -->

<title> Gains Tracker </title>
    
</head>

<body>

<!-- Page menu bar
<div class="main_header">
<img id="h_logo_header" src="images/AWD_fp_1.png" alt="Gains Tracker Logo">
<button id="sign_out_button" onclick="location.href='index.php'" type="button"> Sign Out </button>
<button id="help_button" onclick="location.href='help.php'" type="button"> Help </button>
<button id="about_button" onclick="location.href='about.php'" type="button"> About </button>
<button id="home_button" onclick="location.href='homePage.php'" type="button"> Home </button>
-->
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
  <h3 id="h_text2">Begin Workout </h3>
    <h3 id="h_text">Let the Gains begin! </h3>
    </div>

<!-- </form> -->    
<form class="forms" onsubmit="return formVerificationBW()" method ="post" action ="beginWorkout.php">
<div class="buttons">
<!-- <h1 id="sign_in_header">Sign in </h1> -->
</div>
<br>

<!-- workout type dropdon menu -->
<div id="wtyped">
<label for="wtype"> Workout Type</label>
<select id="wtype" name="wtype" required>
    <option value="">Type</option>
    <option value="upperbody"> Upper body</option>
    <option value="lowerbody">Lower body</option>
    <option value="fullbody">Full body</option>
</select>
<label for="wtype" class="required"></label>
</div>
<br>
<!-- Date text box -->
<div id="dated">
<label for="date"> Date</label>
<input type="date" value="" id="date" name="date" placeholder="yyyy-mm-dd" required>
<label for="date" class="required"></label>
</div>
<br>

<!-- Start time text box -->
<div id="stimed">
<label for="stime"> Start Time</label>
<input type="text" value="" id="stime" name="stime" placeholder="hh:mm:ss" pattern="([0-1]?\d|2[0-3]):([0-5]?\d):([0-5]?\d)" required>
<label for="stime" class="required"></label>
</div>
<br>

<!-- End time text box -->
<div id="etimed">
<label for="etime"> End Time</label>
<input type="text" value="" id="etime" name="etime" placeholder="hh:mm:ss" pattern="([0-1]?\d|2[0-3]):([0-5]?\d):([0-5]?\d)" required>
<label for="etime" class="required"></label>
</div>
<br>

<!-- location text box -->
<div id="locationd">
<label for="location"> Location</label>
<input type="text" value="" id="location" name="location"required>
<label for="location" class="required"></label>
</div> 
<br>
<br>


<!-- none of cardio fields are required -->
<h3 class="default_header"> Cardio </h3>
<br>
<!-- cardio type dropdon menu -->
<div id="ctyped">
<label for="ctype"> Cardio Type</label>
<select id="ctype" name="ctype">
    <option value="">Type</option>
    <option value="running"> Running</option>
    <option value="walking"> Walking</option>
    <option value="cycling">Cycling</option>
    <option value="swimming">Swimming</option>
    <option value="elliptical">Elliptical</option>
</select>
</div>
<br>
<!-- cardio distance (km) text box -->
<div id="distanced">
<label for="distance"> Distance (km)</label>
<input type="number" value="" id="distance" name="distance">
</div>
<br>
<!-- cardio duration text box -->
<div id="durationd">
<label for="duration"> Duration</label>
<input type="text" value="" id="duration" name="duration" placeholder="hh:mm:ss" pattern="([0-1]?\d|2[0-3]):([0-5]?\d):([0-5]?\d)">
</div>
<br>
<!-- hidden place to store array for exercises (may need to change this ) switch exercise_a with post['ehidden']-->
<input type="hidden" value="<?php echo implode(",", $exercise_a);?>" id="ehidden" name="ehidden">


<h3 class="default_header"> Exercises </h3>

<div class="table_bg">
<table class="etable">
  <tr><th>Exercise</th><th>Muscle</th><th>Weight(lbs)</th><th>Reps</th><th>Sets</th></tr>
  <?php
$exercise_a = array();

if(!empty($_POST["ehidden"]))
{
$exercise_a = explode(",",$_POST["ehidden"]);
$len = (count($exercise_a) / 5);
echo "len: ".$len." count: ".count($exercise_a)."";

for($count = 0; $count < $len; $count++)
{
  echo "<tr><td>".$exercise_a[(5 * $count)]."</td><td>".$exercise_a[(1 + (5 * $count))]."</td><td>".$exercise_a[(2 + (5 * $count))]."</td><td>".$exercise_a[(3 + (5 * $count))]."</td><td>".$exercise_a[(4 + (5 * $count))]."</td>";

}

}
if(!empty($_POST["ename"]))
{
    $name = $_POST["ename"]; array_push($exercise_a, $name);
    $muscle = $_POST["emuscle"]; array_push($exercise_a, $muscle);
    $weight = $_POST["eweight"]; array_push($exercise_a, $weight);
    $reps = $_POST["ereps"]; array_push($exercise_a, $reps);
    $sets = $_POST["esets"]; array_push($exercise_a, $sets);


    echo "<tr><td>".$name."</td><td>".$muscle."</td><td>".$weight."</td><td>".$reps."</td><td>".$sets."</td>";
}
?>
</table>
</div>

<!-- hidden to maintain state (pass 'username' value)  -->
<input type="hidden" value="<?php echo $username;?>" id="username" name="username">
<br>
<!-- cancel button -->
<div class="fpd">
<button class="button_default" onclick="location.href='homePage.php'" type="button"> Cancel</button>
</div>
<br>

<!-- save workout button -->
<div class="fpd">
<button id="submit" type="submit">Save Workout</button>
</div>
<br>
<!-- needed for submitting exercises to db -->
<input type="hidden" value="<?php echo implode(",", $exercise_a);?>" id="ehiddenf" name="ehiddenf">
</div>



<div class="buttons">
</div>

</form>

<!-- button to open exercise modal -->
<br>
<div class="fpd">
<button class="button_default "id="myBtn"> + Exercise</button>
</div>
<br>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <button class="ebutton" id="ebutton"> X </button>
    <h2>Exercise</h2>
    <form method="post" onsubmit="return formVerificationE()"action="beginWorkout.php">
  <input type="text" value="" id="ename" name="ename" placeholder="Name"required><br><br>
  <input type="text" value="" id="emuscle" name="emuscle" placeholder="Muscle"required><br><br>
  <input type="number" value="" id="eweight" name="eweight" placeholder="Weight(lbs)"required><br><br>
  <input type="number" value="" id="ereps" name="ereps" placeholder="Repetitions"required><br><br>
  <input type="number" value="" id="esets" name="esets" placeholder="Sets"required><br><br>
  <!-- hidden for exercise  -->
<div id="ehiddend">
<input type="hidden" value="<?php echo implode(",", $exercise_a);?>" id="ehidden" name="ehidden">
</div>
<!-- hidden to maintain state (pass 'username' value)  -->
<input type="hidden" value="<?php echo $username;?>" id="username" name="username">
  <div class="fpd">
  <button class="ebutton" id="submit" type="submit">Enter</button>
</div>

<br><br>

</form>
<!--
    <span class="close">&times;</span> 
-->
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the button that closes
var cbtn = document.getElementById("ebutton");

// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
cbtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php 
if(!empty($_POST["wtype"])) // workout is saved (shows inputted data)
{
  if(!empty($_POST["ehiddenf"])) // (wont submit if you don't have an exercise) might need to ditch post
  {
    /*
  echo"<p>Workout Type: ".$_POST["wtype"] ."<br>";
  echo"Date: ".$_POST["date"] ."<br>";
  echo"Start Time: ".$_POST["stime"] ."<br>";
  echo"End Time: ".$_POST["etime"] ."<br>";
  echo"Location: ".$_POST["location"] ."</p>";
  if(!empty($_POST["ctype"]))
  {
    echo"<p>Cardio Type: ".$_POST["ctype"] ."</p>";
  }
  if(!empty($_POST["distance"]))
  {
    echo"<p>Distance: ".$_POST["distance"] ."</p>";
  }
  if(!empty($_POST["duration"]))
  {
    echo"<p>Duration: ".$_POST["duration"] ."</p>";
  }

  echo "<div class='table_bg'><table class='etable'><tr><th>Exercise</th><th>Muscle</th><th>Weight(lbs)</th><th>Reps</th><th>Sets</th></tr>";
  $exercise_a = explode(",",$_POST["ehiddenf"]);
  $len = (count($exercise_a) / 5);

  for($count = 0; $count < $len; $count++)
  {
    echo "<tr><td>".$exercise_a[(5 * $count)]."</td><td>".$exercise_a[(1 + (5 * $count))]."</td><td>".$exercise_a[(2 + (5 * $count))]."</td><td>".$exercise_a[(3 + (5 * $count))]."</td><td>".$exercise_a[(4 + (5 * $count))]."</td>";
  }
  echo "</table></div>";
  */
  
/* Connecting to DB */
$servername = "localhost";
//$usernamedb = *insert username for database* ; 
//$passworddb= *insert password for database*;
//$dbname =  *insert name of database* ;

//form has successfully been submitted


    /* $username is already set */
    $wtype = $_POST["wtype"];
    $date = $_POST["date"];
    $stime = $_POST["stime"];
    $etime = $_POST["etime"];
    $location = $_POST["location"];

    // needer to display if workout submission went successfully in db
    $error_check = 0;
    /* primary key holders */
    $w_id = "";
    $c_id = "";
    $e_id = "";
  
    
    /* logic
    insert into workoutinfo and get id (reverse search after)
   
    insert each exercise into exercise and get id's (reverse search after)
    
    if (there is cardio)
    {
    insert cardio and get id (reverse search after)

    insert into workoutinfo using all 3 id's 
    }
    else
    {
      insert into workoutinfo using 2 id's
    }

    */
    

    $db_status;
    $db_update;

// Create connection
$conn = new mysqli($servername, $usernamedb, $passworddb, $dbname);

// Check connection
if ($conn->connect_error) {
  $db_status = "Failed";
  $error_check++;
  die("Connection failed: " . $conn->connect_error);
} 
$db_status = "Successful";
/* end of DB connection */

/* insert workoutinfo data into DB */
$sql = "INSERT INTO WorkoutInfo (wtype, wdate, startTime, endTime, wlocation) VALUES ('$wtype', '$date', '$stime','$etime','$location');";

if ($conn->query($sql) === TRUE) {
  $db_update ="New records created successfully";
  } else {
    $error_check++;
    $db_update ="Error: " . $sql . "<br>" . $conn->error;
  }
  //echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br></h2>";
  /* get id for workoutinfo */
  $sql = "SELECT wID FROM WorkoutInfo WHERE wtype='$wtype' AND wdate='$date' AND startTime='$stime' AND endTime='$etime' AND wlocation='$location'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) 
      {
        $w_id = $row["wID"];
      }
    }
  
    // if cardio part of form was filled out
    if(!empty($_POST["ctype"]))
    {
      $ctype = $_POST["ctype"];
      $distance = $_POST["distance"]; // this might cause error if field was empty in form
      $duration = $_POST["duration"];// this might cause error if field was empty in form


/* insert cardio data into DB */
$sql = "INSERT INTO Cardio (ctype, distance, duration) VALUES ('$ctype', '$distance', '$duration');";

if ($conn->query($sql) === TRUE) {
  $db_update ="New records created successfully";
  } else {
    $error_check++;
    $db_update ="Error: " . $sql . "<br>" . $conn->error;
  }
  //echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br></h2>";
  /* get id for cardio */
  $sql = "SELECT cID FROM Cardio WHERE ctype='$ctype' AND distance='$distance' AND duration='$duration'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) 
      {
        $c_id = $row["cID"];
      }
    }
    
    // make sure exercises were added to workout 

    $exercise_a = explode(",",$_POST["ehiddenf"]); // might have to mess around with this
    $len = (count($exercise_a) / 5);
    //echo "len: ".$len." count: ".count($exercise_a)."";
      
    for($count = 0; $count < $len; $count++)
    {
      $val1 = $exercise_a[(5 * $count)];
      $val2 = $exercise_a[(1 + (5 * $count))];
      $val3 = $exercise_a[(2 + (5 * $count))];
      $val4 = $exercise_a[(3 + (5 * $count))];
      $val5 = $exercise_a[(4 + (5 * $count))];
  
      $sql = "INSERT INTO Exercise (ename, muscle, eweight, esets, reps) VALUES ( '$val1' , '$val2' , '$val3' , '$val4' , '$val5' );";
      
      if ($conn->query($sql) === TRUE) {
        $db_update ="New records created successfully";
        } else {
          $error_check++;
          $db_update ="Error: " . $sql . "<br>" . $conn->error;
        }
       // echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br></h2>";
      
        /* get id for exercise */
  $sql = "SELECT eID FROM Exercise WHERE ename='$val1' AND muscle='$val2' AND eweight='$val3' AND esets='$val4' AND reps='$val5'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc())  // might need to switch since nothing is preventing form duplicates of same exercise (so while loop will loop)
      {
        $e_id = $row["eID"];

      }
    }
    
    /* insert workout into db */

    $sql = "INSERT INTO Workout (userName, wID, cID, eID) VALUES ('$username','$w_id','$c_id','$e_id');";
    
    if ($conn->query($sql) === TRUE) {
      $db_update ="New records created successfully";
      } else {
        $error_check++;
        $db_update ="Error: " . $sql . "<br>" . $conn->error;
      }
      //echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br></h2>";
    
    } //for loop ends

    }

    //cardio form wasn't filled out
    else
    {

// make sure exercises were added to workout 

$exercise_a = explode(",",$_POST["ehiddenf"]); // might have to messa around with this
$len = (count($exercise_a) / 5);
// for testing echo "len: ".$len." count: ".count($exercise_a)."";
  
for($count = 0; $count < $len; $count++)
{
  $val1 = $exercise_a[(5 * $count)];
  $val2 = $exercise_a[(1 + (5 * $count))];
  $val3 = $exercise_a[(2 + (5 * $count))];
  $val4 = $exercise_a[(3 + (5 * $count))];
  $val5 = $exercise_a[(4 + (5 * $count))];

  $sql = "INSERT INTO Exercise (ename, muscle, eweight, esets, reps) VALUES ( '$val1' , '$val2' , '$val3' , '$val4' , '$val5' );";
  
  if ($conn->query($sql) === TRUE) {
    $db_update ="New records created successfully";
    } else {
      $db_update ="Error: " . $sql . "<br>" . $conn->error;
      $error_check++;
    }
    //echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br></h2>";
  
    /* get id for exercise */
$sql = "SELECT eID FROM Exercise WHERE ename='$val1' AND muscle='$val2' AND eweight='$val3' AND esets='$val4' AND reps='$val5'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc())  // might need to switch since nothing is preventing form duplicates of same exercise (so while loop will loop)
  {
    $e_id = $row["eID"];

  }
}

/* insert workout into db */

$sql = "INSERT INTO Workout (userName, wID,eID) VALUES ('$username','$w_id','$e_id');";

if ($conn->query($sql) === TRUE) {
  $db_update ="New records created successfully";
  } else {
    $db_update ="Error: " . $sql . "<br>" . $conn->error;
    $error_check++;
  }
  //echo "<h2>Connection: ".$db_status."<br> Update: ".$db_update."<br></h2>";

  

} //for loop ends

    }

    if($error_check > 0)
    {
      echo "<h2 class='default_header'>Something went wrong. The workout was not added to your records. </h2>";
    }
    else
    {
      echo "<h2 class='default_header'> The workout was successfully added to your record.</h2>";
    }
  /* closing DB connection */
$conn->close();

}
else
{
 echo "<h2 class='default_header'>You need to enter an Exercise </h2>";
}



  }

?>
</body>
    
</html>

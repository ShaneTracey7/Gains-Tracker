<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 4th, 2021
Goals page & modal
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
<h3 id="h_text2">Goals </h3>
    <h3 id="h_text">That's the mindset! </h3>
    </div>



<?php
//variables 
/* Connecting to DB */
$servername = "localhost";
//$usernamedb = *insert username for database*; 
//$passworddb = *insert password for database*;
//$dbname = *insert name of database*;

$gids = array();
$name_desc_arr = array();
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

/* getting ID's for Goals */
$sql = "SELECT gID FROM SetGoal WHERE userName='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) 
    {
         array_push($gids,$row["gID"]);
    } 
    $len = count($gids);

        $gname = NULL;
        $gdescription = NULL;

    echo "<div class='pwlist'><ul><li>Name</li><li>Description</li></ul></div><br>";
    
    // loop to create each row 
for($count = 0; $count < $len; $count++)
{
    /* getting goal info */
  $sql = "SELECT gname, gdescription FROM Goal WHERE gID ='$gids[$count]'";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  
    
    while($row = $result->fetch_assoc()) // this won't loop
      {
        $gname = $row["gname"];
        $gdescription = $row["gdescription"];
        //array_push($name_desc_arr,$gname); // odd indexs
        //array_push($name_desc_arr,$gdescription); // even indexs
        echo "<div class='pwlist'><ul><li>".$gname."</li><li>".$gdescription."</li></ul></div><br>";
    
      }
    }
else
{
  // no goals 
  $gname = NULL;
  $gdescription = NULL;
}
} 
      
  }
else // user doesn't have any goals
{
  $e_message="You have no set goals";
  echo "<br><p class='default_content'>You have no set goals</p><br>";

}
if(!empty($_POST["gn"]))
{
if(!empty($_POST["ehidden"]))
{
$name_desc_arr = explode(",",$_POST["ehidden"]);
}
array_push($name_desc_arr,$_POST["gn"]); // odd indexs
array_push($name_desc_arr,$_POST["desc"]); // even indexs
$len = count($name_desc_arr)/2;
for($count = 0; $count < $len; $count++)
 {
  echo "<div class='pwlist'><ul><li>".$name_desc_arr[(2 * $count)]."</li><li>".$name_desc_arr[(1 + (2 * $count))]."</li></ul></div><br>";
 }


}
/*
if(!empty($_POST["ehidden"]))
{
$name_desc_arr = explode(",",$_POST["ehidden"]);
$len = (count($name_desc_arr) / 2);
echo "len: ".$len." count: ".count($name_desc_arr)."";

for($count = 0; $count < $len; $count++)
{
  echo "<tr><td>".$name_desc_arr[(2 * $count)]."</td><br><td>".$name_desc_arr[(1 + (2 * $count))]."</td><br><br>";

}
}
*/
  /* closing DB connection */
$conn->close();
?>
<!-- split -->
<?php
    
 /* Connecting to DB */
$servername = "localhost";
//$usernamedb = *insert username for database*; 
//$passworddb = *insert password for database*;
//$dbname = *insert name of database*;


$gids = array();
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


if(!empty($_POST["ehiddenf"])) // when changes are saved(saves to db)
{

$name_desc_arr = explode(",",$_POST["ehiddenf"]);
$len = (count($name_desc_arr) / 2);
// for testing echo "len: ".$len." count: ".count($name_desc_arr)."";

  if($name_desc_arr[1] == $gdescription ) // checks to make sure it has a different description than last description to avoid goal duplication
  {
    // do nothing
  }
else // different goal so good to go
{
  
for($count = 0; $count < $len; $count++) // for each goal
{
  
  $gname = $name_desc_arr[(2 * $count)];
  $gdescription = $name_desc_arr[(1 + (2 * $count))];
 /* insert goal data into DB */
 $sql = "INSERT INTO Goal (gname, gdescription) VALUES ('$gname', '$gdescription');";

 if ($conn->query($sql) === TRUE) {
   $db_update ="New records created successfully";
   
   } else {
     $db_update ="Error: " . $sql . "<br>" . $conn->error;
     
   }
 
 /* get id for goal */
 $sql = "SELECT gID FROM Goal WHERE gname='$gname' AND gdescription='$gdescription'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  
   while($row = $result->fetch_assoc()) 
     {
       $gid = $row["gID"];
       //array_push($name_desc_arr,$gname);
       //array_push($name_desc_arr,$gdescription);
     }
   
  /* insert entry in set goal data into DB */
  $sql = "INSERT INTO SetGoal (userName, gID) VALUES ('$username', '$gid');";
 
  if ($conn->query($sql) === TRUE) {
    $db_update ="New records created successfully";
    } else {
      $db_update ="Error: " . $sql . "<br>" . $conn->error;
    }
   }
   else
   {
     // do nothing error fetching gid
   }
 //echo "<script type='text/javascript'>location.reload();</script>"; // redirects after you add a goal
 }
 
 for($count = 0; $count < $len; $count++)
 {
  echo "<div class='pwlist'><ul><li>".$name_desc_arr[(2 * $count)]."</li><li>".$name_desc_arr[(1 + (2 * $count))]."</li></ul></div><br>";
  
 }

}

$name_desc_arr = array(); //clears new goal array
}




  /* closing DB connection */
$conn->close();

?>

<!-- button to open exercise modal -->
<br>
<div class="fpd">
<button class="button_default "id="myBtn"> + Goal</button>
</div>
<br>
<br>
<br>
<form method="post" action="goals.php">
<!-- needed for submitting exercises to db -->
<input type="hidden" value="<?php echo implode(",", $name_desc_arr);?>" id="ehiddenf" name="ehiddenf">
</div>
<!-- hidden to maintain state (pass 'username' value)  -->
<input type="hidden" value="<?php echo $username;?>" id="username" name="username">
  <div class="fpd">
<!-- save workout button -->
<div class="fpd">
<button id="submit" type="submit">Save Changes</button>
</div>
</form>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <button class="ebutton" id="ebutton"> X </button>
    <h2>Goal</h2>
    <form method="post" action="goals.php">
  <!--  Goal name text box -->
<input type="text" value="" id="gn" name="gn" placeholder="Enter Goal Name" required><br><br>
<!-- Description text box -->
<input type="text" value="" id="desc" name="desc" placeholder="Enter Description" required><br><br> 
  <!-- hidden for exercise  -->
<div id="ehiddend">
<input type="hidden" value="<?php echo implode(",",$name_desc_arr);?>" id="ehidden" name="ehidden">
</div>
<!-- hidden to maintain state (pass 'username' value)  -->
<input type="hidden" value="<?php echo $username;?>" id="username" name="username">
  <div class="fpd">
  <button class="ebutton" id="submit" type="submit">Enter</button>
</div>

<br><br>

</form>

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the button that closes
var cbtn = document.getElementById("ebutton");

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
<!--
<php

/* Connecting to DB */
$servername = "localhost";
//$usernamedb = *insert username for database*; 
//$passworddb = *insert password for database*;
//$dbname = *insert name of database*;


$gids = array();
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

?>
-->
<!--
if(!empty($_POST["gn"]))
{
  $gname = $_POST["gn"];
  $gdescription = $_POST["desc"];
  $gid = 0; // not a valid id

  /* insert goal data into DB */
$sql = "INSERT INTO Goal (gname, gdescription) VALUES ('$gname', '$gdescription');";

if ($conn->query($sql) === TRUE) {
  $db_update ="New records created successfully";
  
  } else {
    $db_update ="Error: " . $sql . "<br>" . $conn->error;
    
  }

/* get id for goal */
$sql = "SELECT gID FROM Goal WHERE gname='$gname' AND gdescription='$gdescription'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) 
    {
      $gid = $row["gID"];
      array_push($name_desc_arr,$gname);
      array_push($name_desc_arr,$gdescription);
    }
  
 /* insert entry in set goal data into DB */
 $sql = "INSERT INTO SetGoal (userName, gID) VALUES ('$username', '$gid');";

 if ($conn->query($sql) === TRUE) {
   $db_update ="New records created successfully";
   } else {
     $db_update ="Error: " . $sql . "<br>" . $conn->error;
   }
  }
  else
  {
    // do nothing error fetching gid
  }
//echo "<script type='text/javascript'>location.reload();</script>"; // redirects after you add a goal
}
-->
<!--
<php

if(!empty($_POST["ehiddenf"])) // when changes are saved(saves to db)
{
  
$name_desc_arr = explode(",",$_POST["ehiddenf"]);
$len = (count($name_desc_arr) / 2);
echo "len: ".$len." count: ".count($name_desc_arr)."";

for($count = 0; $count < $len; $count++) // for each goal
{
  
  $gname = $name_desc_arr[(2 * $count)];
  $gdescription = $name_desc_arr[(1 + (2 * $count))];
 /* insert goal data into DB */
 $sql = "INSERT INTO Goal (gname, gdescription) VALUES ('$gname', '$gdescription');";

 if ($conn->query($sql) === TRUE) {
   $db_update ="New records created successfully";
   
   } else {
     $db_update ="Error: " . $sql . "<br>" . $conn->error;
     
   }
 
 /* get id for goal */
 $sql = "SELECT gID FROM Goal WHERE gname='$gname' AND gdescription='$gdescription'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  
   while($row = $result->fetch_assoc()) 
     {
       $gid = $row["gID"];
       //array_push($name_desc_arr,$gname);
       //array_push($name_desc_arr,$gdescription);
     }
   
  /* insert entry in set goal data into DB */
  $sql = "INSERT INTO SetGoal (userName, gID) VALUES ('$username', '$gid');";
 
  if ($conn->query($sql) === TRUE) {
    $db_update ="New records created successfully";
    } else {
      $db_update ="Error: " . $sql . "<br>" . $conn->error;
    }
   }
   else
   {
     // do nothing error fetching gid
   }
 //echo "<script type='text/javascript'>location.reload();</script>"; // redirects after you add a goal
 }
 
 for($count = 0; $count < $len; $count++)
 {
  echo "<div class='pwlist'><ul><li>".$name_desc_arr[(2 * $count)]."</li><li>".$name_desc_arr[(1 + (2 * $count))]."</li></ul></div><br>";
  
 }

}




  /* closing DB connection */
$conn->close();

?>
-->
</body>
    
</html>

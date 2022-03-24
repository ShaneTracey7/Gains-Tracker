<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 8th, 2021
Progress Page
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
    <h3 id="h_text2"> Progress</h3>
    <h3 id="h_text"> You've come a long way!</h3>
    </div>

    
    <?php
$tm = getdate(date("U"));
if($tm[mon] < 10 && $tm[mday] < 10)
{
  $datestr = "$tm[year]-0$tm[mon]-0$tm[mday]";
}
else if($tm[mon] < 10)
{
  $datestr = "$tm[year]-0$tm[mon]-$tm[mday]";
}
else if($tm[mday] < 10)
{
  $datestr = "$tm[year]-$tm[mon]-0$tm[mday]";
}
else
{
  $datestr = "$tm[year]-$tm[mon]-$tm[mday]";
}

$month_before = new DateTime($datestr);
$month_before->modify('-30 days');

$ten_weeks = new DateTime($datestr);
// relative to ten_weeks date
$week1 = new DateTime($datestr);
$week2 = new DateTime($datestr);
$week3 = new DateTime($datestr);
$week4 = new DateTime($datestr);
$week5 = new DateTime($datestr);
$week6 = new DateTime($datestr);
$week7 = new DateTime($datestr);
$week8 = new DateTime($datestr);
$week9 = new DateTime($datestr);
$week10 = new DateTime($datestr);


// get to monday
switch($tm[wday]) 
{
  case 0: { // subtract(6+63)days sunday
    $ten_weeks->modify('-69 days');
    $week1->modify('-69 days');
    $week2->modify('-62 days');
    $week3->modify('-55 days');
    $week4->modify('-48 days');
    $week5->modify('-41 days');
    $week6->modify('-34 days');
    $week7->modify('-27 days');
    $week8->modify('-20 days');
    $week9->modify('-13 days');
    $week10->modify('-6 days');

    break;
  } 
  case 1: { // subtract(0+63)days monday
    $ten_weeks->modify('-63 days');
    $week1->modify('-63 days');
    $week2->modify('-56 days');
    $week3->modify('-49 days');
    $week4->modify('-42 days');
    $week5->modify('-35 days');
    $week6->modify('-28 days');
    $week7->modify('-21 days');
    $week8->modify('-14 days');
    $week9->modify('-7 days');
     // week 10 is 0 days
    break;
   } 
  case 2: { // subtract(1+63)days tuesday
    $ten_weeks->modify('-64 days');
    $week1->modify('-64 days');
    $week2->modify('-57 days');
    $week3->modify('-50 days');
    $week4->modify('-43 days');
    $week5->modify('-36 days');
    $week6->modify('-29 days');
    $week7->modify('-22 days');
    $week8->modify('-15 days');
    $week9->modify('-8 days');
    $week10->modify('-1 days');
    break;
   } 
  case 3: { // subtract(2+63)days wednesday
    $ten_weeks->modify('-65 days');
    $week1->modify('-65 days');
    $week2->modify('-58 days');
    $week3->modify('-51 days');
    $week4->modify('-44 days');
    $week5->modify('-37 days');
    $week6->modify('-30 days');
    $week7->modify('-23 days');
    $week8->modify('-16 days');
    $week9->modify('-9 days');
    $week10->modify('-2 days');
    break; 
  } 
  case 4: { // subtract(3+63)days thursday
    $ten_weeks->modify('-66 days');
    $week1->modify('-66 days');
    $week2->modify('-59 days');
    $week3->modify('-52 days');
    $week4->modify('-45 days');
    $week5->modify('-38 days');
    $week6->modify('-31 days');
    $week7->modify('-24 days');
    $week8->modify('-17 days');
    $week9->modify('-10 days');
    $week10->modify('-3 days');
    break; 
  } 
    
  case 5: { // subtract(4+63)days friday
    $ten_weeks->modify('-67 days');
    $week1->modify('-67 days');
    $week2->modify('-60 days');
    $week3->modify('-53 days');
    $week4->modify('-46 days');
    $week5->modify('-39 days');
    $week6->modify('-32 days');
    $week7->modify('-25 days');
    $week8->modify('-18 days');
    $week9->modify('-11 days');
    $week10->modify('-4 days');
    break;
    } 
  case 6: { // subtract(5+63)days saturday
    $ten_weeks->modify('-68 days');
    $week1->modify('-68 days');
    $week2->modify('-61 days');
    $week3->modify('-54 days');
    $week4->modify('-47 days');
    $week5->modify('-40 days');
    $week6->modify('-33 days');
    $week7->modify('-26 days');
    $week8->modify('-19 days');
    $week9->modify('-12 days');
    $week10->modify('-5 days');
    break;
   } 
}
 // try to find amount of each type of workout in the last months 
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

/* Getting DB data For Pie Chart */
  $full_counter = 0; // counter for full body workouts
  $upper_counter = 0; // counter for upper body workouts
  $lower_counter = 0; // counter for lowerbody workouts
  $wid_arr = array(); // array for wids 
/* for 10 bar graph*/
  $w1_counter = 0;
  $w2_counter = 0;
  $w3_counter = 0;
  $w4_counter = 0;
  $w5_counter = 0;
  $w6_counter = 0;
  $w7_counter = 0;
  $w8_counter = 0;
  $w9_counter = 0;
  $w10_counter = 0;
  /* Get all wid's for user and add to array */
  $sql = "SELECT wID FROM Workout WHERE userName='$username'";
    $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) 
      {
        array_push($wid_arr, $row["wID"]);
    }

  }
  $wid_arr = array_unique($wid_arr);
  $wid_arr = array_values($wid_arr);

/* Get all wid's for user and add to array */
for($count = 0; $count < count($wid_arr); $count++)
{
$sql = "SELECT wtype, wdate FROM WorkoutInfo WHERE wID='$wid_arr[$count]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) // shouldnt loop
  {
    $db_date = new DateTime($row["wdate"]);
    if($month_before < $db_date) // if within a month
    {
      $workout_type = $row["wtype"];
      switch($workout_type)
      {
        case "fullbody": $full_counter++;break;
        case "lowerbody": $lower_counter++;break;
        case "upperbody": $upper_counter++;break;
      }
      
    }
    else
      {
        // workout wasn't in the last 30 days
      }
}
      /* for bar graph */
      if($week1 < $db_date) // if within 10 weeks
      {
        if($week2 < $db_date)
        {
          if($week3 < $db_date)
          {
            if($week4 < $db_date)
            {
              if($week5 < $db_date)
              {
                if($week6 < $db_date)
                {
                  if($week7 < $db_date)
                  {
                    if($week8 < $db_date)
                    {
                      if($week9 < $db_date)
                      {
                        if($week10 < $db_date)
                        {
                          $w10_counter++;
                        }
                        else
                        {
                          $w9_counter++;
                        }
                      }
                      else
                      {
                        $w8_counter++;
                      }
                    }
                    else
                    {
                      $w7_counter++;
                    }
                  }
                  else
                  {
                    $w6_counter++;
                  }
                }
                else
                {
                  $w5_counter++;
                }
              }
              else
              {
                $w4_counter++;
              }
            }
            else
            {
              $w3_counter++;
            } 
          }
          else
          {
            $w2_counter++;
          }
        }
        else
        {
          $w1_counter++;
        }
      }
      else
      {
        // do nothing (not within 10 weeks)
      }
}

}

$sum = $full_counter + $lower_counter + $upper_counter;
$sum_bar = $w1_counter + $w2_counter + $w3_counter + $w4_counter + $w5_counter + $w6_counter + $w7_counter + $w8_counter + $w9_counter + $w10_counter;

 $dataPointsPie = array( 
   array("label"=>"Full Body", "y"=>$full_counter/$sum*100),
   array("label"=>"Upper Body", "y"=>$upper_counter/$sum*100),
   array("label"=>"Lower Body", "y"=>$lower_counter/$sum*100)
 );

 $w1 = $week1->format('F-d');
 
 $dataPointsBar = array( 
	array("y" => $w1_counter, "label" => $w1),
	array("y" => $w2_counter, "label" => $week2->format('F-d')),
	array("y" => $w3_counter, "label" => $week3->format('F-d')),
	array("y" => $w4_counter, "label" => $week4->format('F-d')),
	array("y" => $w5_counter, "label" => $week5->format('F-d')),
	array("y" => $w6_counter, "label" => $week6->format('F-d')),
	array("y" => $w7_counter, "label" => $week7->format('F-d')),
  array("y" => $w8_counter, "label" => $week8->format('F-d')),
  array("y" => $w9_counter, "label" => $week9->format('F-d')),
  array("y" => $w10_counter, "label" => $week10->format('F-d'))
);

 ?>
<!--
 -->
 <?php
   /* closing DB connection */
$conn->close();
 ?>
 
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("pieChart", {
  theme: "light2",
	animationEnabled: true,
	title: {
		text: "Workout Types in the Last 30 Days"
	},
	subtitles: [{
		text: "<?php echo "Since ". $month_before->format('F-d-Y'); ?>"
	}],
	data: [{
		type: "pie",
    indexLabel: "{y}",
		yValueFormatString: "##0.0\"%\"",
    indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 12,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		
		dataPoints: <?php echo json_encode($dataPointsPie, JSON_NUMERIC_CHECK); ?> // change back
	}]
});

var chart2 = new CanvasJS.Chart("barChart", {
  animationEnabled: true,
	theme: "light2",
	title:{
		text: "Weekly Workout Frequency"
	},
  subtitles: [{
		text: "Last 10 Weeks"
	}],
	axisY: {
		title: "Workouts"
	},
  axisX: {
		title: "Weeks"
	},
	data: [{
		type: "column",
		yValueFormatString: "# workouts",
		dataPoints: <?php echo json_encode($dataPointsBar, JSON_NUMERIC_CHECK); ?>
	}]
});
//
chart.render();
chart2.render();
 
}
</script>


<?php   
if ($sum == 0)
{
  echo "<p>You have not worked out in the last month.</p>";
}
else
{
  echo "<div class='default_div'><p> What has your focus been on last month? Let's see.</p></div>";
}
?>
<section>
<div id="pieChart" style="width:70%; height: 200px; margin-bottom:5%; margin: auto;">
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</section>
<?php   
if($sum_bar == 0)
{
  echo "<p>You have not worked out in the last 10 weeks.</p>";
}
else
{
  echo "<div class='default_div'><p>It is important to be consistent in your workouts to maintain good health. Lets see how you did the last 10 weeks.</p></div>";

}
?>

<section>
<div id="barChart" style="width:70%; height: 200px; margin-bottom:5%; margin: auto;">
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</section>
<section>

<div class="default_div"><p></p></div>
</body>
    
</html>
